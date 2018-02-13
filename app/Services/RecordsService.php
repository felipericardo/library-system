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
     * @param array $data
     *
     * @return Record|bool
     */
    public function create(array $data)
    {
        if (!$this->booksService->checkAvailable($data['book_id'])) {
            return false;
        }

        $data['value'] = $this->__calculateValue($data['start'], $data['expected_end']);

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
            $data['value'] = $this->__calculateValue($data['start'], $data['expected_end']);
        }

        return $this->recordsRepository->update($id, $data);
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
}