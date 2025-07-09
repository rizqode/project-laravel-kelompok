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
        'foto',
        'categori_id',
    ];

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categori_id');
    }

    public function fotos()
    {
        return $this->hasMany(PaketFoto::class);
    }
}
