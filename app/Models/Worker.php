<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'Workers';
    protected $primaryKey = 'worker_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_worker',
        'last_name',
        'phone_number',
        'email',
        'appointment_date',
        'date_of_birth',
        'position_id',
        'showroom_id',
        'login',
        'password'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    public function showroom()
    {
        return $this->belongsTo(CarShowroom::class, 'showroom_id', 'showroom_id');
    }

    public function showroomDirector()
    {
        return $this->hasMany(CarShowroom::class, 'worker_id', 'director_id');
    }
    public function managerForContract()
    {
        return $this->hasMany(HistoryOfBuyingAndSellingCar::class, 'worker_id', 'manager_id');
    }
}
