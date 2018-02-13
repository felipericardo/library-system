<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'document', 'email', 'birthdate'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = clearCpf($value);
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = convertDate('d/m/Y', 'Y-m-d', $value);
    }
}
