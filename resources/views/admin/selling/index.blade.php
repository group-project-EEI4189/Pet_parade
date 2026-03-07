<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Selling Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .admin-navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-navbar h1 {
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-navbar a { color: white; text-decoration: none; }

        .container { max-width: 1200px; margin: 0 auto; padding: 2rem; }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header-section h2 {
            font-size: 2rem;
            color: #333;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.4);
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Tab Filters */
        .tab-bar {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .tab-btn {
            padding: 0.6rem 1.4rem;
            border-radius: 30px;
            border: 2px solid #dee2e6;
            background: white;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            color: #555;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.95rem;
        }

        .tab-btn.active          { border-color: #667eea; background: #667eea; color: white; }
        .tab-btn.cat.active      { border-color: #1976d2; background: #1976d2; color: white; }
        .tab-btn.dog.active      { border-color: #f57c00; background: #f57c00; color: white; }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.14);
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-img-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #e9ecef, #dee2e6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }

        .best-seller-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, #f7971e, #ffd200);
            color: #333;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .pet-type-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
        }

        .pet-type-badge.cat { background: #e3f2fd; color: #1976d2; }
        .pet-type-badge.dog { background: #fff3e0; color: #f57c00; }

        .card-body { padding: 1.2rem; }

        .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.35rem;
            color: #222;
        }

        .card-category {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 0.75rem;
        }

        .card-price {
            font-size: 1.3rem;
            font-weight: 800;
            color: #667eea;
            margin-bottom: 0.4rem;
        }

        .card-stock {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .card-actions { display: flex; gap: 0.5rem; }

        .btn-edit, .btn-delete {
            flex: 1;
            padding: 0.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            transition: all 0.2s;
            font-size: 0.875rem;
        }

        .btn-edit { background: #e7f3ff; color: #0066cc; }
        .btn-edit:hover { background: #0066cc; color: white; }

        .btn-delete { background: #ffe7e7; color: #cc0000; }
        .btn-delete:hover { background: #cc0000; color: white; }

        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: #aaa;
            grid-column: 1 / -1;
        }

        .empty-state i { font-size: 3.5rem; margin-bottom: 1rem; display: block; }
        .empty-state p { font-size: 1.1rem; }
    </style>
</head>
<body>

<div class="admin-navbar">
    <h1>
        <i class="fas fa-cube"></i>
        PETPARADE Admin
    </h1>
    <div style="display:flex; align-items:center; gap:1.5rem;">
        <a href="{{ route('admin.products.index') }}"><i class="fas fa-boxes"></i> Products</a>
        <a href="{{ route('shop') }}"><i class="fas fa-arrow-left"></i> Back to Shop</a>
    </div>
</div>

<div class="container">

    <div class="header-section">
        <h2><i class="fas fa-fire" style="color:#f7971e;"></i> Best Selling Items</h2>
        <a href="{{ route('admin.selling.create') }}" class="btn-add">
            <i class="fas fa-plus"></i> Add Best Seller
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Pet Type Filter Tabs --}}
    <div class="tab-bar">
        <a href="{{ route('admin.selling.index') }}"
           class="tab-btn {{ !request('filter') ? 'active' : '' }}">
            <i class="fas fa-th"></i> All
        </a>
        <a href="{{ route('admin.selling.index', ['filter' => 'cat']) }}"
           class="tab-btn cat {{ request('filter') == 'cat' ? 'active' : '' }}">
            🐱 Cats
        </a>
        <a href="{{ route('admin.selling.index', ['filter' => 'dog']) }}"
           class="tab-btn dog {{ request('filter') == 'dog' ? 'active' : '' }}">
            🐶 Dogs
        </a>
    </div>

    <div class="cards-grid">
        @forelse($bestSellers as $item)
            <div class="product-card">

                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="card-img">
                @else
                    <div class="card-img-placeholder">
                        {{ $item->pet_type === 'cat' ? '🐱' : '🐶' }}
                    </div>
                @endif

                <div class="best-seller-badge"><i class="fas fa-star"></i> Best Seller</div>

                <span class="pet-type-badge {{ $item->pet_type }}">
                    {{ $item->pet_type === 'cat' ? '🐱 Cat' : '🐶 Dog' }}
                </span>

                <div class="card-body">
                    <div class="card-title">{{ $item->name }}</div>
                    <div class="card-category">
                        {{ $item->subcategory->category->name ?? '' }}
                        @if($item->subcategory) › {{ $item->subcategory->name }} @endif
                    </div>
                    <div class="card-price">${{ number_format($item->price, 2) }}</div>
                    <div class="card-stock"><i class="fas fa-box"></i> Stock: {{ $item->stock }}</div>

                    <div class="card-actions">
                        <a href="{{ route('admin.selling.edit', $item) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.selling.destroy', $item) }}" method="POST" style="flex:1;">
                            @csrf @method('DELETE')
                            <button class="btn-delete" style="width:100%;" onclick="return confirm('Remove this item from Best Sellers?')">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="empty-state">
                <i class="fas fa-star"></i>
                <p>No best sellers yet.<br>Click <strong>Add Best Seller</strong> to feature items!</p>
            </div>
        @endforelse
    </div>

</div>
</body>
</html>
