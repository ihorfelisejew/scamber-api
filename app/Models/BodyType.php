<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    use HasFactory;

    protected $table = 'BodyTypes';
    protected $primaryKey = 'type_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_type'
    ];

    public function bodyTypeForCars()
    {
        return $this->hasMany(Car::class, 'type_id', 'body_type_id');
    }
}
