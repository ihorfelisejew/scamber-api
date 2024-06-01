<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $primaryKey = 'city_id';
    protected $table = 'cities';

    protected $fillable = ['city_name'];

    public function showrooms()
    {
        return $this->hasMany(Showroom::class, 'city_id', 'city_id');
    }

    public function parkingLots()
    {
        return $this->hasMany(ParkingLot::class, 'city_id', 'city_id');
    }
}
