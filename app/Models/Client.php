<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'Clients';
    protected $primaryKey = 'client_id';
    public $timestamps = false;

    protected $fillable = [
        'clients_name',
        'last_name',
        'phone_number',
        'email',
        'login',
        'password',
        'date_of_birth',
        'passport_number',
        'series',
        'date_of_issue',
        'identification_code',
    ];

    public function clientForCars()
    {
        return $this->hasMany(Car::class, 'client_id', 'client_id');
    }
    public function clientForContract()
    {
        return $this->hasMany(HistoryOfBuyingAndSellingCar::class, 'client_id', 'client_id');
    }
    public function clientForReview()
    {
        return $this->hasMany(Review::class, 'client_id', 'client_id');
    }
}
