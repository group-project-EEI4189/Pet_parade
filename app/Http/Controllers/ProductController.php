<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function update(Request $request, $id)
{
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
    }

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->save();

    return response()->json(['success' => true]);
}

}
