<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PetDetails;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'name',
        'email',
        'address',
        'phone'
    ];

    public function pet()
    {
        return $this->belongsTo(PetDetails::class, 'pet_id');
    }
}