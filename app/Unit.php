<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'number_unit', 'item_id', 'room_id'
    ];

    protected $appends = [
        'status'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getStatusAttribute()
    {
        $transactionDetail = $this->transaction_detail() ?? null;
        $status = 'Ada';
        if ($transactionDetail) {
            $query = $this->transaction_detail()->orderBy('created_at', 'DESC')->first();
            $status = $query['status'] ?? 'Ada';
        }

        // switch ($status) {
        //     case 'Ada':
        //         $status = '';
        //         break;
        //     case 'exit':
        //         $status = '';
        //         break;
        //         //dst
        // }

        return $status;
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function transaction_detail()
    {
        return $this->hasManyThrough(Transaction_detail::class, Transaction::class);
    }
}
