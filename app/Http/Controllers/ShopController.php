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
        $selectedCategory = $request->query('category');
        $selectedSubcategory = $request->query('subcategory');

        $productsQuery = Product::with('subcategory.category');
        if ($selectedSubcategory) {
            $productsQuery->where('subcategory_id', $selectedSubcategory);
        } elseif ($selectedCategory) {
            $subcategoryIds = Subcategory::where('category_id', $selectedCategory)->pluck('id');
            $productsQuery->whereIn('subcategory_id', $subcategoryIds);
        }
        $products = $productsQuery->paginate(12);

        return view('shop.index', compact('categories', 'products', 'selectedCategory', 'selectedSubcategory'));
    }
}
