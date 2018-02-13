<?php

namespace App\Factories;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordsFactory
{
    /**
     * @param array $data
     *
     * @return Record
     */
    public static function fromArray(array $data)
    {
        $record = new Record();
        if (isset($data['customer_id'])) {
            $record->customer_id = $data['customer_id'];
        }
        if (isset($data['book_id'])) {
            $record->book_id = $data['book_id'];
        }
        if (isset($data['start'])) {
            $record->start = $data['start'];
        }
        if (isset($data['expected_end'])) {
            $record->expected_end = $data['expected_end'];
        }
        if (isset($data['value'])) {
            $record->value = $data['value'];
        }

        return $record;
    }

    /**
     * @param Request $request
     *
     * @return Record
     */
    public static function fromRequest(Request $request)
    {
        $record = new Record();
        if ($request->has('customer_id')) {
            $record->customer_id = $request->get('customer_id');
        }
        if ($request->has('book_id')) {
            $record->book_id = $request->get('book_id');
        }
        if ($request->has('start')) {
            $record->start = $request->get('start');
        }
        if ($request->has('expected_end')) {
            $record->expected_end = $request->get('expected_end');
        }
        if ($request->has('value')) {
            $record->value = $request->get('value');
        }

        return $record;
    }
}