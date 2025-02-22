<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    
    protected $table = 'tips'; 
    protected $fillable = ['tab_name', 'content', 'added_by', 'status'];
    
}

