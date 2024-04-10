<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'Cities';
    protected $primaryKey = 'city_id';
    public $timestamps = false;

    protected $fillable = [
        'city'
    ];

    public function streetInCity()
    {
        return $this->hasMany(Street::class, 'city_id', 'city_id');
    }
}
