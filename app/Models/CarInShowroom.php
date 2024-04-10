<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInShowroom extends Model
{
    use HasFactory;

    protected $table = 'CarsInShowroom';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'car_id',
        'showroom_id'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
    public function showroom()
    {
        return $this->belongsTo(CarShowroom::class, 'showroom_id', 'showroom_id');
    }
}
