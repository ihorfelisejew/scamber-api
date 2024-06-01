<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';
    protected $fillable = [
        'client_name',
        'client_last_name',
        'contacts',
        'order_details',
        'acceptance_status',
        'execution_status',
    ];
}
