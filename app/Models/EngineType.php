<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineType extends Model
{
    use HasFactory;

    protected $table = 'EngineType';
    protected $primaryKey = 'engine_id';
    public $timestamps = false;

    protected $fillable = [
        'type_of_engine'
    ];

    public function engineTypeForCar()
    {
        return $this->hasMany(Car::class, 'engine_id', 'engine_type_id');
    }
}
