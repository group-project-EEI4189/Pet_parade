<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetDetails extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'breed',
        'age',
        'description',
        'image'
    ];
}
