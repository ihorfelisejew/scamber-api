<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $primaryKey = 'worker_id';
    protected $fillable = [
        'name',
        'last_name',
        'phone_number',
        'email',
        'date_of_birth',
        'appointment_date',
        'position_id',
        'showroom_id',
        'login',
        'password'
    ];

    protected $dates = ['date_of_birth', 'appointment_date'];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    public function showroom()
    {
        return $this->belongsTo(Showroom::class, 'showroom_id', 'showroom_id');
    }

    public function managerForContract()
    {
        return $this->hasMany(ContractOnCar::class, 'manager_id', 'worker_id');
    }
}
