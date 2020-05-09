<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'name'
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
