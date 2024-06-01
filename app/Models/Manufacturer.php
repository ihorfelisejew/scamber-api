<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $primaryKey = 'manufacturer_id';
    protected $fillable = [
        'manufacture_name',
        'phone_number',
        'email',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'manufacturer_id', 'manufacturer_id');
    }
}
