@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-xl font-bold mb-4">Manage Products</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Add New Product Button -->
    <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Add New Product
    </a>

    <!-- Product Table -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Availability</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">{{ $product->category }}</td>
                <td class="px-4 py-2">{{ $product->price }}</td>
                <td class="px-4 py-2">{{ $product->availability ? 'Available' : 'Not Available' }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
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
