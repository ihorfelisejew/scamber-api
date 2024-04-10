<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfContract extends Model
{
    use HasFactory;

    protected $table = 'TypesOfContract';
    protected $primaryKey = 'contract_type_id';
    public $timestamps = false;

    protected $fillable = [
        'type_name'
    ];

    public function typeOfContract()
    {
        return $this->hasMany(HistoryOfBuyingAndSellingCar::class, 'contract_type_id', 'type_of_contract_id');
    }
}
