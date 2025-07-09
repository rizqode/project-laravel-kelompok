<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketFoto extends Model
{

    protected $fillable = [
        'paket_id',
        'foto',
    ];
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
