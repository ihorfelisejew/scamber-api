<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarShowroom extends Model
{
    use HasFactory;

    protected $table = 'CarShowrooms';
    protected $primaryKey = 'showroom_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_showroom',
        'showroom_phone_number',
        'director_id',
        'house_number',
        'street_id'
    ];

    public function director()
    {
        return $this->belongsTo(Worker::class, 'director_id', 'worker_id');
    }
    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id', 'street_id');
    }

    public function carInShowroom()
    {
        return $this->hasMany(CarInShowroom::class, 'showroom_id', 'showroom_id');
    }
    public function showroomForBuyingOrSelling()
    {
        return $this->hasMany(HistoryOfBuyingAndSellingCar::class, 'showroom_id', 'showroom_id');
    }
    public function showroomForReview()
    {
        return $this->hasMany(Review::class, 'showroom_id', 'showroom_id');
    }
}
