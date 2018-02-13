<?php

namespace App\Repositories;

use App\Factories\RecordsFactory;
use App\Models\Record;
use Exception;

class RecordsRepository
{
    /**
     * @var Record
     */
    private $record;

    /**
     * RecordsRepository constructor.
     *
     * @param Record $record
     */
    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    /**
     * @param array $data
     *
     * @return Record|bool
     */
    public function create(array $data)
    {
        $record = RecordsFactory::fromArray($data);
        try {
            $record->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $record;
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return Record|bool
     */
    public function update($id, array $data)
    {
        $record = $this->findById($id);
        if (!$record) {
            return false;
        }

        $record->fill($data);
        try {
            $record->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $record;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return Record::destroy($id) > 0;
    }

    /**
     * @return Record[]
     */
    public function findAll()
    {
        return Record::all();
    }

    /**
     * @param int $id
     *
     * @return Record|null
     */
    public function findById($id)
    {
        return Record::where('id', $id)->first();
    }

    /**
     * @param int $bookId
     *
     * @return Record[]|null
     */
    public function findOpensByBookId($bookId)
    {
        return Record::where(['book_id' => $bookId, 'real_end' => null])->get();
    }
}