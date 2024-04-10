<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'Cars';
    protected $primaryKey = 'car_id';
    public $timestamps = false;

    protected $fillable = [
        'price',
        'body_type_id',
        'manufacture_id',
        'car_model',
        'year_of_manufacture',
        'complete_set',
        'car_mileage',
        'car_number',
        'VIN_code',
        'color',
        'engine_type_id',
        'engine_capacity',
        'gearbox_id',
        'drive_id',
        'fuel_consumption',
        'other_desc',
        'client_id',
        'offered_for_sale'
    ];

    public function bodyType()
    {
        return $this->belongsTo(BodyType::class, 'body_type_id', 'type_id');
    }
    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class, 'manufacture_id', 'manufacture_id');
    }
    public function engineType()
    {
        return $this->belongsTo(EngineType::class, 'engine_type_id', 'engine_id');
    }
    public function gearbox()
    {
        return $this->belongsTo(Gearbox::class, 'gearbox_id', 'gearbox_id');
    }
    public function drive()
    {
        return $this->belongsTo(Drive::class, 'drive_id', 'drive_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
    public function carInParkingLot()
    {
        return $this->hasMany(CarInParkingLot::class, 'car_id', 'car_id');
    }
    public function carInShowroom()
    {
        return $this->hasMany(CarInShowroom::class, 'car_id', 'car_id');
    }
    public function buyOrCellCar()
    {
        return $this->hasMany(HistoryOfBuyingAndSellingCar::class, 'car_id', 'car_id');
    }
}
