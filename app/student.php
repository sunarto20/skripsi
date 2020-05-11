<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // protected $table = 'students';
    protected $fillable = [
        'name', 'user_id', 'registration_number', 'gender', 'phone_number', 'class_id', 'avatar'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
