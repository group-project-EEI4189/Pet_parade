<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
        ]);

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    // Show form to edit an existing product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update product in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product from the database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
