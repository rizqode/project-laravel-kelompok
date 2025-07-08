<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'nama',
        'kontak',
        'paket',
        'tanggal',
        'catatan',
        'kode',
        'status',
        'tanggal_booking',
        'bukti_transfer'
    ];
}
