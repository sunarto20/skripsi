<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'unit_id', 'status', 'reciever', 'notes'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'reciever');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
