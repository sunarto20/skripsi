<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'number_unit', 'item_id', 'room_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
