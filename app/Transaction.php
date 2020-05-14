<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $appends = ['status_pinjam', 'status_return'];

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

    public function transaction_detail()
    {
        return $this->hasMany(Transaction_detail::class);
    }

    public function getStatusPinjamAttribute()
    {
        $tanggal_pinjam = $this->transaction_detail()->where('status', 'pinjam')->first();

        return $tanggal_pinjam->created_at ?? null;
    }

    public function getStatusReturnAttribute()
    {
        $tanggal_kembali = $this->transaction_detail()->where('status', 'return')->first();

        return $tanggal_kembali->created_at ?? null;
    }
}
