<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gearbox extends Model
{
    use HasFactory;

    protected $table = 'Gearboxes';
    protected $primaryKey = 'gearbox_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_gearbox'
    ];

    public function gearboxTypeForCar()
    {
        return $this->hasMany(Car::class, 'gearbox_id', 'gearbox_id');
    }
}
