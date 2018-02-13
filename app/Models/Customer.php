<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'document', 'email', 'birthdate'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
