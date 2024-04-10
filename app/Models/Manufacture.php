<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;

    protected $table = 'Manufactures';
    protected $primaryKey = 'manufacture_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_manufacture',
        'phone_number',
        'email'
    ];

    public function manufactureOfCar()
    {
        return $this->hasMany(Car::class, 'manufacture_id', 'manufacture_id');
    }
}
