<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInParkingLot extends Model
{
    use HasFactory;
    protected $table = 'cars_in_parking_lots';
    protected $fillable = [
        'car_id',
        'parking_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }

    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class, 'parking_id', 'parking_id');
    }
}
