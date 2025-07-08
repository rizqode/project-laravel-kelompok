<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    protected $fillable = ['nama', 'foto_path'];

    public function paketFotos()
    {
        return $this->hasMany(Paket::class, 'kategori_id');
    }
}
