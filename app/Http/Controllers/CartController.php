<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    // Show all cart items
    public function index()
    {
        $cartItems = CartItem::all();
        return view('admin.cart.index', compact('cartItems'));
    }

    // Update cart item status (e.g., confirm order)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($validated);
        return redirect()->route('admin.cart.index')->with('success', 'Cart item updated successfully!');
    }

    // Delete cart item
    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('admin.cart.index')->with('success', 'Cart item deleted successfully!');
    }
}
