<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestSelling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSellingController extends Controller
{
    // GET /admin/selling
    public function index(Request $request)
    {
        $query = BestSelling::query();

        // Optional filter: cat or dog
        if ($request->filter === 'cat') {
            $query->where('pet_type', 'cat');
        } elseif ($request->filter === 'dog') {
            $query->where('pet_type', 'dog');
        }

        $bestSellers = $query->latest()->get();

        return view('admin.selling.index', compact('bestSellers'));
    }

    // GET /admin/selling/create
    public function create()
    {
        return view('admin.selling.create');
    }

    // POST /admin/selling
    public function store(Request $request)
    {
        $request->validate([
            'product_name'   => 'required|string|max:255',
            'pet_type'       => 'required|in:cat,dog',
            'price'          => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description'    => 'nullable|string',
            'product_image'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('product_image')->store('best_sellings', 'public');

        BestSelling::create([
            'product_name'   => $request->product_name,
            'pet_type'       => $request->pet_type,
            'price'          => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'description'    => $request->description,
            'product_image'  => $imagePath,
        ]);

        return redirect()->route('admin.selling.index')
                         ->with('success', 'Best seller added successfully!');
    }

    // GET /admin/selling/{id}/edit
    public function edit($id)
    {
        // ✅ Variable name matches Blade
        $bestSeller = BestSelling::findOrFail($id);

        return view('admin.selling.edit', compact('bestSeller'));
    }

    // PUT /admin/selling/{id}
    public function update(Request $request, $id)
    {
        $bestSeller = BestSelling::findOrFail($id);

        $request->validate([
            'product_name'   => 'required|string|max:255',
            'pet_type'       => 'required|in:cat,dog',
            'price'          => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description'    => 'nullable|string',
            'product_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update fields
        $bestSeller->product_name   = $request->product_name;
        $bestSeller->pet_type       = $request->pet_type;
        $bestSeller->price          = $request->price;
        $bestSeller->stock_quantity = $request->stock_quantity;
        $bestSeller->description    = $request->description;

        // Handle image upload
        if ($request->hasFile('product_image')) {
            // Delete old image
            if ($bestSeller->product_image) {
                Storage::disk('public')->delete($bestSeller->product_image);
            }
            $bestSeller->product_image = $request->file('product_image')->store('best_sellings', 'public');
        }

        $bestSeller->save();

        return redirect()->route('admin.selling.index')
                         ->with('success', 'Best seller updated successfully!');
    }

    // DELETE /admin/selling/{id}
    public function destroy($id)
    {
        $bestSeller = BestSelling::findOrFail($id);

        // Delete image from storage
        if ($bestSeller->product_image) {
            Storage::disk('public')->delete($bestSeller->product_image);
        }

        $bestSeller->delete();

        return redirect()->route('admin.selling.index')
                         ->with('success', 'Item removed from Best Sellers.');
    }
}