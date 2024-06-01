<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'review_id';
    protected $fillable = [
        'showroom_id',
        'client_id',
        'content',
        'rating',
    ];

    public function showroom()
    {
        return $this->belongsTo(Showroom::class, 'showroom_id', 'showroom_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
