<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'nama_klien',
        'email',
        'tanggal',
        'catatan',
        'status',
        'paket_id',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
