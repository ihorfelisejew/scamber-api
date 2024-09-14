<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOrder extends Model
{
    use HasFactory;

    protected $table = 'cars_orders';
    protected $fillable = [
        'client_name',
        'phone_number',
        'car_id',
        'date_of_event',
        'status'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
}
