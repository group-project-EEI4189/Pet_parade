<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bestSeller->name }} — PetParade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .shop-navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .shop-navbar h1 {
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .shop-navbar a { color: white; text-decoration: none; font-weight: 600; }

        .container {
            max-width: 1000px;
            margin: 2.5rem auto;
            padding: 0 2rem;
        }

        .breadcrumb {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb a { color: #667eea; text-decoration: none; }
        .breadcrumb a:hover { text-decoration: underline; }

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        /* Image Panel */
        .image-panel {
            position: relative;
            background: #f8f9fa;
        }

        .product-image {
            width: 100%;
            height: 420px;
            object-fit: cover;
        }

        .image-placeholder {
            width: 100%;
            height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8rem;
            background: linear-gradient(135deg, #e9ecef, #dee2e6);
        }

        .badge-best-seller {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(135deg, #f7971e, #ffd200);
            color: #333;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 0.45rem 1rem;
            border-radius: 25px;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        .badge-pet-type {
            position: absolute;
            top: 16px;
            right: 16px;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 0.45rem 1rem;
            border-radius: 25px;
        }

        .badge-pet-type.cat { background: #e3f2fd; color: #1565c0; }
        .badge-pet-type.dog { background: #fff3e0; color: #e65100; }

        /* Info Panel */
        .info-panel {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-category {
            font-size: 0.85rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.6rem;
        }

        .product-name {
            font-size: 1.8rem;
            font-weight: 800;
            color: #222;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: 900;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .product-stock {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }

        .stock-in  { color: #2e7d32; }
        .stock-low { color: #f57c00; }
        .stock-out { color: #c62828; }

        .divider {
            border: none;
            border-top: 1px solid #dee2e6;
            margin: 1.25rem 0;
        }

        .product-description {
            font-size: 0.97rem;
            color: #555;
            line-height: 1.75;
            margin-bottom: 1.5rem;
        }

        .detail-list {
            list-style: none;
            margin-bottom: 1.75rem;
        }

        .detail-list li {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.92rem;
            color: #555;
            padding: 0.4rem 0;
            border-bottom: 1px dashed #f0f0f0;
        }

        .detail-list li i { color: #667eea; width: 16px; text-align: center; }

        .btn-cart {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
        }

        .btn-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.45);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .btn-back:hover { text-decoration: underline; }

        @media (max-width: 700px) {
            .product-layout { grid-template-columns: 1fr; }
            .product-image, .image-placeholder { height: 280px; }
        }
    </style>
</head>
<body>

<div class="shop-navbar">
    <h1><i class="fas fa-paw"></i> PETPARADE</h1>
    <a href="{{ route('shop') }}"><i class="fas fa-store"></i> Shop</a>
</div>

<div class="container">

    <div class="breadcrumb">
        <a href="{{ route('shop') }}">Shop</a>
        <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
        <a href="{{ route('shop') }}">Best Sellers</a>
        <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
        <span>{{ $bestSeller->name }}</span>
    </div>

    <div class="product-layout">

        {{-- Left: Image --}}
        <div class="image-panel">
            @if($bestSeller->image)
                <img src="{{ asset('storage/' . $bestSeller->image) }}"
                     alt="{{ $bestSeller->name }}"
                     class="product-image">
            @else
                <div class="image-placeholder">
                    {{ $bestSeller->pet_type === 'cat' ? '🐱' : '🐶' }}
                </div>
            @endif

            <div class="badge-best-seller">
                <i class="fas fa-star"></i> Best Seller
            </div>

            <span class="badge-pet-type {{ $bestSeller->pet_type }}">
                {{ $bestSeller->pet_type === 'cat' ? '🐱 Cat' : '🐶 Dog' }}
            </span>
        </div>

        {{-- Right: Info --}}
        <div class="info-panel">
            <div class="product-category">
                {{ $bestSeller->subcategory->category->name ?? '' }}
                @if($bestSeller->subcategory)
                    › {{ $bestSeller->subcategory->name }}
                @endif
            </div>

            <div class="product-name">{{ $bestSeller->name }}</div>

            <div class="product-price">${{ number_format($bestSeller->price, 2) }}</div>

            @php $stock = $bestSeller->stock; @endphp
            @if($stock > 10)
                <span class="product-stock stock-in"><i class="fas fa-check-circle"></i> In Stock ({{ $stock }} available)</span>
            @elseif($stock > 0)
                <span class="product-stock stock-low"><i class="fas fa-exclamation-circle"></i> Low Stock — only {{ $stock }} left!</span>
            @else
                <span class="product-stock stock-out"><i class="fas fa-times-circle"></i> Out of Stock</span>
            @endif

            <hr class="divider">

            @if($bestSeller->description)
                <p class="product-description">{{ $bestSeller->description }}</p>
            @endif

            <ul class="detail-list">
                <li><i class="fas fa-tag"></i> <strong>Category:</strong> {{ $bestSeller->subcategory->category->name ?? 'N/A' }}</li>
                <li><i class="fas fa-layer-group"></i> <strong>Subcategory:</strong> {{ $bestSeller->subcategory->name ?? 'N/A' }}</li>
                <li><i class="fas fa-paw"></i> <strong>For:</strong> {{ ucfirst($bestSeller->pet_type) }}s</li>
            </ul>

            @if($stock > 0)
                <form action="{{ route('cart.add', $bestSeller) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-cart">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button>
                </form>
            @else
                <button class="btn-cart" disabled style="opacity:0.5; cursor:not-allowed;">
                    <i class="fas fa-ban"></i> Out of Stock
                </button>
            @endif

            <a href="{{ route('shop') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Back to Shop
            </a>
        </div>

    </div>
</div>

</body>
</html>
