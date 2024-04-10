<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOfBuyingAndSellingCar extends Model
{
    use HasFactory;

    protected $table = 'HistoryOfBuyingAndSellingCars';
    protected $primaryKey = 'operation_id';
    public $timestamps = false;

    protected $fillable = [
        'date_of_registration',
        'car_id',
        'showroom_id',
        'client_id',
        'manager_id',
        'contract_amount',
        'type_of_contract_id',
        'contract'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }
    public function showroom()
    {
        return $this->belongsTo(CarShowroom::class, 'car_id', 'car_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
    public function manager()
    {
        return $this->belongsTo(Worker::class, 'manager_id', 'worker_id');
    }
    public function typeOfContract()
    {
        return $this->belongsTo(TypeOfContract::class, 'type_of_contract_id', 'contract_type_id');
    }
}
