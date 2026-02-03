@extends('layouts.app')

@section('content')
<style>
    .shop-container {
        background: linear-gradient(135deg, #fde4d8 0%, #fef0eb 100%);
        min-height: calc(100vh - 200px);
        padding: 3rem 2rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .page-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #2c2c2c;
        margin-bottom: 0.5rem;
    }

    .search-box {
        max-width: 400px;
        margin: 1rem auto;
        display: none;
        align-items: center;
        background: white;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .search-box input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 1rem;
        background: transparent;
    }

    .search-box i {
        color: #e89080;
        font-size: 1.1rem;
        margin-right: 0.5rem;
    }

    .category-filters {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .cat-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        border: 2px solid transparent;
        background: rgba(232, 144, 128, 0.15);
        color: #d17564;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.95rem;
    }

    .cat-badge:hover {
        background: rgba(232, 144, 128, 0.25);
    }

    .cat-badge.active {
        background: #e89080;
        color: white;
    }

    .cat-badge i {
        font-size: 1.1rem;
    }

    .section-container {
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c2c2c;
        margin-bottom: 1.5rem;
        text-align: left;
    }

    .products-wrapper {
        display: flex;
        gap: 1.5rem;
        overflow-x: auto;
        padding-bottom: 1rem;
        scroll-behavior: smooth;
    }

    .products-wrapper::-webkit-scrollbar {
        height: 6px;
    }

    .products-wrapper::-webkit-scrollbar-track {
        background: rgba(0,0,0,0.05);
        border-radius: 10px;
    }

    .products-wrapper::-webkit-scrollbar-thumb {
        background: #e89080;
        border-radius: 10px;
    }

    .product-card {
        flex: 0 0 200px;
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .product-image {
        width: 100%;
        height: 180px;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-remove-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background: white;
        border: none;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: #999;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .product-remove-btn:hover {
        color: #e89080;
        transform: scale(1.1);
    }

    .product-info {
        padding: 1rem;
    }

    .product-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2c2c2c;
        margin-bottom: 0.3rem;
        line-height: 1.3;
        min-height: 2.6rem;
    }

    .product-price {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 0.8rem;
    }

    .add-btn {
        width: 100%;
        padding: 0.6rem;
        background: #e89080;
        color: white;
        border: none;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
        font-size: 0.85rem;
    }

    .add-btn:hover {
        background: #d17564;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #999;
        font-size: 1.1rem;
    }

    .carousel-nav {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .carousel-nav button {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid #e89080;
        background: white;
        color: #e89080;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .carousel-nav button:hover {
        background: #e89080;
        color: white;
    }

    .filters-container {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-bottom: 2rem;
        align-items: flex-end;
    }

    .pet-selection {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .pet-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.8rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        border: 2px solid #e89080;
        background: white;
        color: #d17564;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 1rem;
    }

    .pet-btn:hover {
        background: rgba(232, 144, 128, 0.1);
    }

    .pet-btn.active {
        background: #e89080;
        color: white;
    }

    .pet-btn i {
        font-size: 1.3rem;
    }

    .category-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .category-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        border: 2px solid transparent;
        background: rgba(232, 144, 128, 0.15);
        color: #d17564;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.95rem;
    }

    .category-btn:hover {
        background: rgba(232, 144, 128, 0.25);
    }

    .category-btn.active {
        background: #e89080;
        color: white;
    }

    .category-btn i {
        font-size: 1.1rem;
    }

    /* Simplified product card */
    .product-card {
        width: 220px;
        padding: 12px;
        border-radius: 12px;
        background: linear-gradient(180deg, #fff, #fff8f8);
        box-shadow: 0 6px 18px rgba(232,144,128,0.06);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        text-align: center;
    }

    .product-card .product-image img {
        width: 120px;
        height: 120px;
        object-fit: contain;
        border-radius: 8px;
        background: #fff;
        padding: 8px;
    }

    .product-card .product-name {
        font-weight: 600;
        color: #7a3036;
        font-size: 0.98rem;
        min-height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-card .product-price {
        color: #ff6b6b;
        font-weight: 700;
    }

</style>

<div class="shop-container">
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Header -->
        <div class="page-header">
            <h1>Your Matches</h1>
            <div class="search-bar" style="margin-top:8px;">
                @php
                    $sessionCartInline = session('cart', []);
                    $cartCountInline = 0;
                    if (is_array($sessionCartInline)) { foreach ($sessionCartInline as $it) { $cartCountInline += $it['quantity'] ?? 0; } }
                    if (\Illuminate\Support\Facades\Auth::check()) { $cartCountInline += \App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->sum('quantity'); }
                @endphp
                <div style="display:flex; gap:12px; align-items:center; justify-content:space-between; width:100%;">
                    <form action="{{ route('shop.index') }}" method="GET" style="display:flex; gap:8px; align-items:center; flex:1; max-width:760px;">
                        <input type="hidden" name="pet" value="{{ $selectedPet ?? 'cat' }}">
                        <input type="hidden" name="group" value="{{ $selectedGroup ?? '' }}">
                        <input type="text" name="q" placeholder="Search products..." value="{{ old('q', $q ?? request('q')) }}" class="search-input" style="padding:8px 10px; border-radius:8px; border:1px solid #f0cfcf; flex:1; min-width:160px;">
                        <button type="submit" class="btn btn-red" style="padding:8px 12px;">Search</button>
                    </form>
                    <div style="margin-left:16px;">
                        <a href="{{ route('cart.index') }}" class="btn-cart-inline" title="View cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-inline-count">{{ $cartCountInline }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Left-align header + search */
            .page-header { display:flex; flex-direction:column; align-items:flex-start; gap:6px; margin-bottom:12px; }
            @media (max-width: 768px) { .search-input { min-width:160px; } }

            /* Inline cart button next to search */
            .btn-cart-inline {
                display:inline-flex;
                align-items:center;
                gap:8px;
                padding:8px 10px;
                border-radius:8px;
                text-decoration:none;
                color:#e89080;
                border:1px solid rgba(232,144,128,0.12);
                background: #fff;
                box-shadow: 0 6px 18px rgba(232,144,128,0.04);
            }
            .btn-cart-inline i { font-size:1rem; }
            .cart-inline-count {
                background:#ff6b6b;
                color:white;
                padding:3px 7px;
                border-radius:12px;
                font-weight:700;
                font-size:0.85rem;
            }
            @media (max-width: 520px) {
                .btn-cart-inline { padding:6px 8px; }
                .search-input { min-width:120px; }
            }
        </style>

        <!-- Filters Container -->
        <div class="filters-container">
            <!-- Pet Selection -->
            <div class="pet-selection">
                <a href="{{ route('shop.index', ['pet' => 'cat']) }}" class="pet-btn {{ ($selectedPet ?? 'cat') == 'cat' ? 'active' : '' }}">
                    <i class="fa-solid fa-cat"></i> Cat
                </a>
                <a href="{{ route('shop.index', ['pet' => 'dog']) }}" class="pet-btn {{ ($selectedPet ?? 'cat') == 'dog' ? 'active' : '' }}">
                    <i class="fa-solid fa-dog"></i> Dog
                </a>
            </div>

            <!-- Category Selection -->
            <div class="category-buttons">
                <a href="{{ route('shop.index', ['pet' => $selectedPet ?? 'cat', 'group' => 'foods_medicines']) }}" 
                   class="category-btn {{ request('group') == 'foods_medicines' ? 'active' : '' }}">
                    <i class="fa-solid fa-pills"></i> Foods & Medicines
                </a>
                <a href="{{ route('shop.index', ['pet' => $selectedPet ?? 'cat', 'group' => 'accessories_toys']) }}" 
                   class="category-btn {{ request('group') == 'accessories_toys' ? 'active' : '' }}">
                    <i class="fa-solid fa-gift"></i> Accessories & Toys
                </a>
            </div>
        </div>

        <!-- Products by Subcategory -->
        @php
            $grouped = $products->groupBy(function($p) {
                return $p->subcategory->name ?? 'Other';
            });
        @endphp

        @forelse($grouped as $subcategoryName => $items)
            <div class="section-container">
                <div class="section-title">{{ $subcategoryName }}</div>
                <div class="carousel-nav">
                    <button onclick="scrollLeft(event)" title="Scroll left"><i class="fa-solid fa-chevron-left"></i></button>
                    <button onclick="scrollRight(event)" title="Scroll right"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                <div class="products-wrapper" data-carousel>
                    @forelse($items as $product)
                        <div class="product-card">
                            <div class="product-image">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <div style="width: 120px; height: 120px; background: #fff0f0; display: flex; align-items: center; justify-content: center; color: #e89080; border-radius:8px;">
                                        <i class="fa-solid fa-image" style="font-size: 2rem;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="product-info">
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                <form action="{{ route('cart.add', $product) }}" method="POST" style="margin: 0; display:flex; gap:8px; align-items:center; justify-content:center;">
                                    @csrf
                                    <button type="submit" class="btn-add-square" aria-label="Add {{ $product->name }} to cart">
                                        <i class="fa-solid fa-cart-plus"></i>
                                        <span style="font-size:0.9rem; line-height:1;">Add</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state" style="grid-column: 1/-1;">No products found</div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="empty-state">No products available at the moment.</div>
        @endforelse
    </div>
</div>

<script>
    function scrollLeft(e) {
        const carousel = e.target.closest('.carousel-nav').nextElementSibling;
        carousel.scrollBy({ left: -300, behavior: 'smooth' });
    }

    function scrollRight(e) {
        const carousel = e.target.closest('.carousel-nav').nextElementSibling;
        carousel.scrollBy({ left: 300, behavior: 'smooth' });
    }
</script>
@endsection
