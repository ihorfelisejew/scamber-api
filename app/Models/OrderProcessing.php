<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProcessing extends Model
{
    use HasFactory;

    protected $table = 'OrderProcessing';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = [
        'client_name',
        'client_last_name',
        'client_contacts',
        'order_detail',
        'acceptance_status',
        'execution_status'
    ];
}
