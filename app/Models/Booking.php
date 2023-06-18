<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'booking_cars', 'booking_id', 'car_id');
    }
}
