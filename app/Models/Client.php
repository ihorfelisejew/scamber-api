<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Client extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, Notifiable;

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
        'identification_code',
        'remember_token'
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

    public function isClient()
    {
        return true;
    }

    public function isAdmin()
    {
        return false;
    }
}
