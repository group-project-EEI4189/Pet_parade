<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();
        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request, Cart $cart)
    {
    // $this->authorize('update', $cart); // Authorization commented for now
        $cart->update(['quantity' => $request->input('quantity', 1)]);
        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function remove(Cart $cart)
    {
    // $this->authorize('delete', $cart); // Authorization commented for now
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
