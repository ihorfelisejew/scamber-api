<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;

    protected $table = 'Streets';
    protected $primaryKey = 'street_id';
    public $timestamps = false;

    protected $fillable = [
        'street_name',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function showroomStreet()
    {
        return $this->hasMany(CarShowroom::class, 'street_id', 'street_id');
    }
    public function parkingLotStreet()
    {
        return $this->hasMany(ParkingLot::class, 'street_id', 'street_id');
    }
}
