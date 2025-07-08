<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'durasi',
        'fasilitas',
        'deskripsi',
        'gambar'
    ];
}
