@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $product->name }}</h1>
            
            @if($product->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 400px;">
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Category:</strong> {{ $product->subcategory->category->name ?? 'N/A' }}</p>
                    <p><strong>Subcategory:</strong> {{ $product->subcategory->name ?? 'N/A' }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $product->stock ?? 'N/A' }}</p>
                    <p><strong>Description:</strong></p>
                    <p>{{ $product->description ?? 'No description' }}</p>
                </div>
            </div>

            <div class="mb-4">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
