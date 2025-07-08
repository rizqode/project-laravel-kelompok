<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'price', 'description', 'duration', 'category'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
