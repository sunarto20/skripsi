<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'reciever');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
