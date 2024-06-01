<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    use HasFactory;
    protected $primaryKey = 'showroom_id';

    // Заповнювані поля
    protected $fillable = [
        'showroom_name',
        'phone_number',
        'house_number',
        'street_name',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function carsInShowrooms()
    {
        return $this->hasMany(CarInShowroom::class, 'showroom_id', 'showroom_id');
    }

    public function contractsInShowrooms()
    {
        return $this->hasMany(ContractOnCar::class, 'showroom_id', 'showroom_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'showroom_id', 'showroom_id');
    }

    public function worker()
    {
        return $this->hasMany(Worker::class, 'showroom_id', 'showroom_id');
    }
}
