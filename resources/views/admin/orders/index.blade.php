@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Orders</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Status</th>
                <th>Total</th>
                <th>Items</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->total }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                        <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @if($order->status === 'pending')
                        <form action="{{ route('admin.orders.confirm', $order) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                        </form>
                        <form action="{{ route('admin.orders.cancel', $order) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                        </form>
                    @else
                        <span class="text-muted">No actions</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
