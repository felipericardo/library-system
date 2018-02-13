<?php

namespace App\Services;

use App\Models\Record;
use App\Repositories\RecordsRepository;
use Carbon\Carbon;

class RecordsService
{
    /**
     * @var BooksService
     */
    private $booksService;

    /**
     * @var RecordsRepository
     */
    private $recordsRepository;

    /**
     * RecordsService constructor.
     *
     * @param BooksService $booksService
     * @param RecordsRepository $recordsRepository
     */
    public function __construct(
        BooksService $booksService,
        RecordsRepository $recordsRepository
    ) {
        $this->booksService = $booksService;
        $this->recordsRepository = $recordsRepository;
    }

    /**
     * @param string $start
     * @param string $expectedEnd
     *
     * @return float
     */
    private function __calculateValue($start, $expectedEnd)
    {
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $expectedEnd = Carbon::createFromFormat('Y-m-d', $expectedEnd);

        return round($expectedEnd->diffInDays($start) * config('prices.perDay'), 2);
    }

    /**
     * @param string $expectedEnd
     * @param string $realEnd
     *
     * @return float
     */
    private function __calculateFee($expectedEnd, $realEnd)
    {
        $expectedEnd = Carbon::createFromFormat('Y-m-d', $expectedEnd);
        $realEnd = Carbon::createFromFormat('Y-m-d', $realEnd);

        return round($realEnd->diffInDays($expectedEnd) * config('prices.feePerDay'), 2);
    }

    /**
     * @param Record $record
     *
     * @return bool
     */
    private function __hasLate(Record $record)
    {
        if (empty($record->real_end)) {
            return $record->expected_end < date('Y-m-d');
        }

        return $record->expected_end < $record->real_end;
    }

    /**
     * @param array $data
     *
     * @return Record|bool
     */
    public function create(array $data)
    {
        if (!$this->booksService->checkAvailable($data['book_id'])) {
            return false;
        }

        $data['value'] = $this->__calculateValue(
            convertDate('d/m/Y', 'Y-m-d', $data['start']),
            convertDate('d/m/Y', 'Y-m-d', $data['expected_end'])
        );

        return $this->recordsRepository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return Record|bool
     */
    public function update($id, array $data)
    {
        $record = $this->recordsRepository->findById($id);
        if ($data['book_id'] != $record->book->id && !$this->booksService->checkAvailable($data['book_id'])) {
            return false;
        }

        if ($data['start'] != $record->book->start || $data['expected_end'] != $record->book->expected_end) {
            $data['value'] = $this->__calculateValue(
                convertDate('d/m/Y', 'Y-m-d', $data['start']),
                convertDate('d/m/Y', 'Y-m-d', $data['expected_end'])
            );
        }

        return $this->recordsRepository->update($id, $data);
    }

    public function complete($id)
    {
        $record = $this->recordsRepository->findById($id);
        if (!empty($record->real_end)) {
            return false;
        }

        $data['real_end'] = date('Y-m-d H:i:s');
        $data['fee'] = $this->__calculateFee($record->expected_end, date('Y-m-d'));
        $data['amount'] = $record->value + $data['fee'];

        return $this->recordsRepository->update($id, $data);
    }

    /**
     * @return Record[]|null
     */
    public function findOpens()
    {
        $records = $this->recordsRepository->findOpens();
        foreach ($records as $record) {
            $record->has_late = $this->__hasLate($record);
            $record->current_fee = 0;
            if ($record->has_late) {
                $record->current_fee = $this->__calculateFee($record->expected_end, date('Y-m-d'));
            }
            $record->current_amount = round($record->value + $record->current_fee, 2);
        }

        return $records;
    }

    /**
     * @return Record[]|null
     */
    public function findClosed()
    {
        $records = $this->recordsRepository->findClosed();
        foreach ($records as $record) {
            $record->has_late = $this->__hasLate($record);
        }

        return $records;
    }

    public function getLastMonthRevenues()
    {
        return $this->recordsRepository->findClosedByMonth(date('m', strtotime('-1 month')));
    }

    public function getCurrentRevenues()
    {
        return $this->recordsRepository->findClosedByMonth(date('m'));
    }
}