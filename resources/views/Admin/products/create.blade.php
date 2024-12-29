@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-xl font-bold mb-4">Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Category</label>
            <input type="text" name="category" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Price</label>
            <input type="number" name="price" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Availability</label>
            <select name="availability" class="w-full p-2 border border-gray-300 rounded">
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Product</button>
    </form>
</div>
@endsection
