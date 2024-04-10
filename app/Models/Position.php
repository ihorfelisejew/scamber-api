<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'Positions';
    protected $primaryKey = 'position_id';
    public $timestamps = false;

    protected $fillable = [
        'name_of_position'
    ];

    public function positionForWorker()
    {
        return $this->hasMany(Worker::class, 'position_id', 'position_id');
    }
}
