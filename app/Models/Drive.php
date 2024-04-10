<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory;

    protected $table = 'Drives';
    protected $primaryKey = 'drive_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_drive'
    ];

    public function driveTypeForCar()
    {
        return $this->hasMany(Car::class, 'drive_id', 'drive_id');
    }
}
