@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Orders</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Status</th>
                <th>Total</th>
                <th>Items</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->total }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                        <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
