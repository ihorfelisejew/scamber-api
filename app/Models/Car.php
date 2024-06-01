<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_id';
    protected $fillable = [
        'manufacturer_id',
        'model',
        'year_of_manufacture',
        'price',
        'car_mileage',
        'body_type',
        'engine_type',
        'engine_capacity',
        'gearbox_type',
        'drive_type',
        'fuel_consumption',
        'VIN_code',
        'color',
        'other_desc',
        'client_id',
        'offered_for_sale'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    public function carsInParkingLots()
    {
        return $this->hasMany(CarInParkingLot::class, 'car_id', 'car_id');
    }

    public function carsInShowrooms()
    {
        return $this->hasMany(CarInShowroom::class, 'car_id', 'car_id');
    }

    public function contractsOnCar()
    {
        return $this->hasMany(ContractOnCar::class, 'car_id', 'car_id');
    }
}
