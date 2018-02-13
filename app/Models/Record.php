<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'customer_id',
        'book_id',
        'start',
        'expected_end',
        'real_end',
        'value',
        'fee',
        'amount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = convertDate('d/m/Y', 'Y-m-d', $value);
    }

    public function setExpectedEndAttribute($value)
    {
        $this->attributes['expected_end'] = convertDate('d/m/Y', 'Y-m-d', $value);
    }

    public function hasFee()
    {
        return $this->fee > 0;
    }
}
