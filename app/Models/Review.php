<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'Reviews';
    protected $primaryKey = 'review_id';
    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'showroom_id',
        'content',
        'rating_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
    public function showroom()
    {
        return $this->belongsTo(CarShowroom::class, 'showroom_id', 'showroom_id');
    }
    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id', 'rating_id');
    }
}
