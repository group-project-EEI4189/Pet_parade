<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_type',
        'category',
        'title',
        'body',
    ];

    /**
     * Scope: filter by pet type (includes 'both')
     */
    public function scopeForPetType($query, string $type)
    {
        return $query->where(function ($q) use ($type) {
            $q->where('pet_type', $type)
              ->orWhere('pet_type', 'both');
        });
    }

    /**
     * Scope: filter by category
     */
    public function scopeOfCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
