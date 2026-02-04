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
        if (Auth::check()) {
            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        } else {
            $sessionCart = session('cart', []);
            $productIds = array_map(fn($i) => $i['product_id'], $sessionCart);
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
            $cartItems = collect();
            foreach ($sessionCart as $pid => $data) {
                $product = $products[$data['product_id']] ?? Product::find($data['product_id']);
                if (!$product) continue;
                $cartItems->push((object)[
                    'id' => null,
                    'product_id' => $product->id,
                    'quantity' => $data['quantity'],
                    'product' => $product,
                ]);
            }
        }
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1',
        ]);

        $quantity = $request->input('quantity', 1);

        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();
            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            $sessionCart = session('cart', []);
            $pid = (string)$product->id;
            if (isset($sessionCart[$pid])) {
                $sessionCart[$pid]['quantity'] += $quantity;
            } else {
                $sessionCart[$pid] = ['product_id' => $product->id, 'quantity' => $quantity];
            }
            session(['cart' => $sessionCart]);
        }

        // compute cart count for response
        $sessionCart = session('cart', []);
        $cartCount = 0;
        if (is_array($sessionCart)) { foreach ($sessionCart as $it) { $cartCount += $it['quantity'] ?? 0; } }
        if (\Illuminate\Support\Facades\Auth::check()) { $cartCount += Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->sum('quantity'); }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Product added to cart.', 'count' => $cartCount]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $quantity = $request->input('quantity', 1);

        $itemSubtotal = 0;

        if (Auth::check()) {
            $cartId = $request->input('cart_id');
            $cart = Cart::find($cartId);
            if (!$cart || $cart->user_id !== Auth::id()) {
                abort(403);
            }
            $cart->update(['quantity' => $quantity]);
            $itemSubtotal = $cart->quantity * $cart->product->price;
        } else {
            $productId = (string) $request->input('product_id');
            $sessionCart = session('cart', []);
            if ($productId && isset($sessionCart[$productId])) {
                $sessionCart[$productId]['quantity'] = $quantity;
                session(['cart' => $sessionCart]);
                $product = Product::find($productId);
                $itemSubtotal = $product ? ($product->price * $quantity) : 0;
            }
        }

        // recompute totals and count
        $sessionCart = session('cart', []);
        $cartCount = 0;
        $subtotal = 0;
        if (is_array($sessionCart)) {
            foreach ($sessionCart as $it) {
                $cartCount += $it['quantity'] ?? 0;
                $prod = Product::find($it['product_id']);
                if ($prod) $subtotal += $prod->price * $it['quantity'];
            }
        }
        if (Auth::check()) {
            $cartCount += Cart::where('user_id', Auth::id())->sum('quantity');
            $subtotal += Cart::with('product')->where('user_id', Auth::id())->get()->sum(fn($c) => $c->product->price * $c->quantity);
        } else {
            // subtotal already computed from session loop
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart updated.',
                'item_subtotal' => number_format($itemSubtotal, 2),
                'total' => number_format($subtotal, 2),
                'count' => $cartCount,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function remove(Request $request)
    {
        $removedProductId = null;
        if (Auth::check()) {
            $cartId = $request->input('cart_id');
            $cart = Cart::find($cartId);
            if (!$cart || $cart->user_id !== Auth::id()) {
                abort(403);
            }
            $removedProductId = $cart->product_id;
            $cart->delete();
        } else {
            $productId = (string) $request->input('product_id');
            $sessionCart = session('cart', []);
            if ($productId && isset($sessionCart[$productId])) {
                unset($sessionCart[$productId]);
                session(['cart' => $sessionCart]);
                $removedProductId = $productId;
            }
        }

        // recompute totals and count
        $sessionCart = session('cart', []);
        $cartCount = 0;
        $subtotal = 0;
        if (is_array($sessionCart)) {
            foreach ($sessionCart as $it) {
                $cartCount += $it['quantity'] ?? 0;
                $prod = Product::find($it['product_id']);
                if ($prod) $subtotal += $prod->price * $it['quantity'];
            }
        }
        if (Auth::check()) {
            $cartCount += Cart::where('user_id', Auth::id())->sum('quantity');
            $subtotal += Cart::with('product')->where('user_id', Auth::id())->get()->sum(fn($c) => $c->product->price * $c->quantity);
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart.',
                'removed_product' => $removedProductId,
                'total' => number_format($subtotal, 2),
                'count' => $cartCount,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
