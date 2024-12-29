@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-xl font-bold mb-4">Manage Cart Items</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Cart Table -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-4 py-2">Item Name</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $item->product_name }}</td>
                <td class="px-4 py-2">{{ $item->quantity }}</td>
                <td class="px-4 py-2">{{ $item->price }}</td>
                <td class="px-4 py-2">{{ $item->status }}</td>
                <td class="px-4 py-2 space-x-2">
                    <form action="{{ route('admin.cart.update', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <input type="text" name="status" placeholder="Enter status" required class="border border-gray-300 rounded px-2 py-1">
                        <button type="submit" class="text-blue-600 hover:underline">Update</button>
                    </form>
                    <form action="{{ route('admin.cart.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
