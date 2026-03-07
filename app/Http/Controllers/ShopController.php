<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('subcategories')->get();
        $selectedPet = $request->query('pet') ?? 'cat';
        $selectedGroup = $request->query('group');

        $productsQuery = Product::with('subcategory.category');
        
        // Filter by pet type (cat or dog)
        $productsQuery->where('pet_type', $selectedPet);
        
        // Filter by group (foods_medicines or accessories_toys)
        if ($selectedGroup === 'foods_medicines') {
            $subcategoryNames = ['Food', 'Medicine'];
            $subcategoryIds = Subcategory::whereIn('name', $subcategoryNames)->pluck('id');
            $productsQuery->whereIn('subcategory_id', $subcategoryIds);
        } elseif ($selectedGroup === 'accessories_toys') {
            $subcategoryNames = ['Accessories', 'Toy'];
            $subcategoryIds = Subcategory::whereIn('name', $subcategoryNames)->pluck('id');
            $productsQuery->whereIn('subcategory_id', $subcategoryIds);
        }

        // Search by name or description
        $q = $request->query('q');
        if ($q) {
            $productsQuery->where(function($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            });
        }
        
        $products = $productsQuery->get();

        return view('shop.index', compact('categories', 'products', 'selectedPet', 'selectedGroup', 'q'));
    }
}
