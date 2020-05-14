<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $fillable = [
        'transaction_id', 'status'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
