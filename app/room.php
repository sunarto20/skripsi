<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
