<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    protected $primaryKey = 'parking_id';
    protected $fillable = [
        'house_number',
        'street_name',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function carsInParkingLots()
    {
        return $this->hasMany(CarInParkingLot::class, 'parking_id', 'parking_id');
    }
}
