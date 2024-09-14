<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $primaryKey = 'order_id';
    public $fillable = [
        'client_name',
        'client_last_name',
        'phone_number',
        'order_details',
        'acceptance_status',
        'execution_status',
        'email',
        'low_price',
        'high_price',
        'min_year',
        'max_year',
        'manufacturer_id',
        'car_model'
    ];
}
