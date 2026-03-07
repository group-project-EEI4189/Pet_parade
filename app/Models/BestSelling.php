<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BestSelling extends Model
{
    protected $fillable = [
        'product_name',
        'pet_type',
        'price',
        'stock_quantity',
        'description',
        'product_image',
    ];
}