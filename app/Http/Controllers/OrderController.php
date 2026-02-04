<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // User confirms order
    public function confirm(Request $request)
    {
        if (Auth::check()) {
            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
            }
            $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'pending',
            ]);
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            Cart::where('user_id', Auth::id())->delete();
            return redirect()->route('orders.user')->with('success', 'Order placed successfully.');
        } else {
            $request->validate([
                'guest_name' => 'required|string|max:255',
                'guest_email' => 'required|email|max:255',
            ]);

            $sessionCart = session('cart', []);
            if (empty($sessionCart)) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
            }

            $productIds = array_map(fn($i) => $i['product_id'], $sessionCart);
            $products = \App\Models\Product::whereIn('id', $productIds)->get()->keyBy('id');

            $order = Order::create([
                'user_id' => null,
                'guest_name' => $request->input('guest_name'),
                'guest_email' => $request->input('guest_email'),
                'total' => 0,
                'status' => 'pending',
            ]);

            $total = 0;
            foreach ($sessionCart as $item) {
                $product = $products[$item['product_id']] ?? null;
                if (!$product) continue;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);
                $total += $product->price * $item['quantity'];
            }

            $order->update(['total' => $total]);
            session()->forget('cart');
            return redirect()->route('shop')->with('success', 'Order placed successfully. Your order id: ' . $order->id);
        }
    }

    // User views their orders
    public function userOrders()
    {
        $orders = Order::with('items.product')->where('user_id', Auth::id())->get();
        return view('orders.user', compact('orders'));
    }

    // Admin views all orders
    public function index()
    {
        $orders = Order::with('user', 'items.product')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Admin confirms an order
    public function adminConfirm(Order $order)
    {
        $order->update(['status' => 'confirmed']);
        return redirect()->route('admin.orders.index')->with('success', 'Order confirmed.');
    }

    // Admin cancels an order
    public function adminCancel(Order $order)
    {
        $order->update(['status' => 'cancelled']);
        return redirect()->route('admin.orders.index')->with('success', 'Order cancelled.');
    }

    // Admin deletes an order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted.');
    }
}
