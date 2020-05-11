<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'spesification', 'foto'
    ];

    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
