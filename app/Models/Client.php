<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'client_id';
    protected $fillable = [
        'name',
        'last_name',
        'phone_number',
        'email',
        'login',
        'password',
        'date_of_birth',
        'passport_number',
        'series',
        'date_of_issue',
        'identification_code'
    ];
    protected $dates = ['date_of_birth', 'date_of_issue'];

    public function cars()
    {
        return $this->hasMany(Car::class, 'client_id', 'client_id');
    }

    public function contractsForClient()
    {
        return $this->hasMany(ContractOnCar::class, 'client_id', 'client_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'client_id', 'client_id');
    }
}
