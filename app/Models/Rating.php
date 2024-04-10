<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'Rating';
    protected $primaryKey = 'rating_id';
    public $timestamps = false;

    protected $fillable = [
        'type_rating'
    ];

    public function ratingInReview()
    {
        return $this->hasMany(Review::class, 'rating_id', 'rating_id');
    }
}
