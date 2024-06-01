<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractOnCar extends Model
{
    use HasFactory;

    protected $primaryKey = 'contract_id';
    protected $table = 'history_of_contracts';
    protected $fillable = [
        'date_of_purchase',
        'car_id',
        'showroom_id',
        'client_id',
        'manager_id',
        'type_of_contract',
        'contract_url',
    ];

    protected $dates = ['date_of_purchase'];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id');
    }

    public function showroom()
    {
        return $this->belongsTo(Showroom::class, 'showroom_id', 'showroom_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    public function manager()
    {
        return $this->belongsTo(Worker::class, 'manager_id', 'worker_id');
    }
}
