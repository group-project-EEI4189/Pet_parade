<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Specify the table name if it is not the default plural of the model name
    protected $table = 'cart_items';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = ['product_id', 'quantity', 'status'];

    // Define any relationships (if needed, e.g., a cart item belongs to a product)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
