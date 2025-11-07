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
}
