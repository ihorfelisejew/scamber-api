<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;

    protected $table = 'ParkingLots';
    protected $primaryKey = 'parking_id';
    public $timestamps = false;

    protected $fillable = [
        'house_number',
        'street_id'
    ];

    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id', 'street_id');
    }

    public function carInParkingLot()
    {
        return $this->hasMany(CarInParkingLot::class, 'parking_id', 'parking_lot_id');
    }

}
