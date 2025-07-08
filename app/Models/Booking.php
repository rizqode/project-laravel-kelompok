<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_name',
        'phone_number',
        'booking_date',
        'package_id',
        'status',
        'payment_status',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
