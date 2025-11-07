@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shop</h1>
    <div class="row mb-4">
        <div class="col-md-3">
            <h5>Categories</h5>
            <ul class="list-group">
                <li class="list-group-item {{ !$selectedCategory ? 'active' : '' }}">
                    <a href="{{ route('shop.index') }}" class="text-decoration-none">All</a>
                </li>
                @foreach($categories as $category)
                    <li class="list-group-item {{ $selectedCategory == $category->id ? 'active' : '' }}">
                        <a href="{{ route('shop.index', ['category' => $category->id]) }}" class="text-decoration-none">{{ $category->name }}</a>
                        <ul class="list-unstyled ms-3">
                            @foreach($category->subcategories as $subcategory)
                                <li class="{{ $selectedSubcategory == $subcategory->id ? 'fw-bold' : '' }}">
                                    <a href="{{ route('shop.index', ['subcategory' => $subcategory->id]) }}" class="text-decoration-none">{{ $subcategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text fw-bold">${{ $product->price }}</p>
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width:80px;display:inline-block;">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No products found.</p>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
