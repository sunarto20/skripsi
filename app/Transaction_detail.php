<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $fillable = [
        'transaction_id', 'status', 'notes', 'returned_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function getExitTransaction($query)
    {
        return $query->where('status', 'exit')->first();
    }

    public function unit()
    {
        return $this->belongsToMany(Unit::class);
    }
}
