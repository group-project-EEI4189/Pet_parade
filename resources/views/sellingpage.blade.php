<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Selling Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #fdf6f4;
            color: #333;
        }

        /* ── Hero Banner ── */
        .page-hero {
            background: linear-gradient(135deg, #dd8a75 0%, #e8a090 100%);
            padding: 2.5rem 2rem;
            text-align: center;
        }

        .page-hero h1 {
            font-size: 2rem;
            color: white;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            text-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .page-hero p {
            color: #fff0ec;
            font-size: 1rem;
        }

        /* ── Container ── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ── Cards Grid ── */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        /* ── Card ── */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(221, 138, 117, 0.1);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #f5ddd7;
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 380px;        /* ← tall cards */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 28px rgba(221, 138, 117, 0.22);
        }

        .card img {
            width: 100%;
            height: 210px;            /* ← taller image */
            object-fit: cover;
        }

        .card-img-placeholder {
            width: 100%;
            height: 210px;            /* ← match image height */
            background: linear-gradient(135deg, #fde8e2, #fdf0ec);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }

        /* Best Seller badge */
        .badge-best {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, #dd8a75, #c9705a);
            color: white;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.28rem 0.7rem;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            box-shadow: 0 2px 6px rgba(221,138,117,0.35);
        }

        /* Pet type badge */
        .badge-pet {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.28rem 0.7rem;
            border-radius: 20px;
        }

        .badge-pet.cat { background: #fde8e2; color: #c9705a; }
        .badge-pet.dog { background: #fdf0e8; color: #c47a3a; }

        /* Card body */
        .card-body {
            padding: 1.2rem 1.3rem 1.5rem;
            flex: 1;                  /* ← fills remaining height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 700;
            color: #3a2a26;
            margin-bottom: 0.6rem;
            line-height: 1.4;
            min-height: 44px;         /* ← consistent title height */
        }

        .card-price {
            font-size: 1.3rem;
            font-weight: 800;
            color: #dd8a75;
            margin-bottom: 0.5rem;
        }

        .card-stock {
            font-size: 0.82rem;
            color: #b09590;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .card-stock.low { color: #c47a3a; }
        .card-stock.out { color: #c0392b; }

        /* ── Empty State ── */
        .empty {
            text-align: center;
            padding: 5rem 2rem;
            grid-column: 1 / -1;
        }

        .empty i {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            display: block;
            color: #e8b5a8;
        }

        .empty p { font-size: 1.05rem; color: #c9a09a; }

        @media (max-width: 600px) {
            .cards { grid-template-columns: 1fr 1fr; }
            .page-hero h1 { font-size: 1.5rem; }
            .card { min-height: unset; }
        }

        @media (max-width: 400px) {
            .cards { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="page-hero">
    <h1><i class="fas fa-fire"></i> Best Selling Products</h1>
    <p>Our most loved items for your furry friends 🐾</p>
</div>

<div class="container">
    <div class="cards">

        @forelse($bestSellers as $item)
            <div class="card">

                @if($item->product_image)
                    <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->product_name }}">
                @else
                    <div class="card-img-placeholder">
                        {{ $item->pet_type === 'cat' ? '🐱' : '🐶' }}
                    </div>
                @endif

                <div class="badge-best"><i class="fas fa-star"></i> Best Seller</div>
                <span class="badge-pet {{ $item->pet_type }}">
                    {{ $item->pet_type === 'cat' ? '🐱 Cat' : '🐶 Dog' }}
                </span>

                <div class="card-body">
                    <div>
                        <div class="card-title">{{ $item->product_name }}</div>
                        <div class="card-price">${{ number_format($item->price, 2) }}</div>
                    </div>

                    @if($item->stock_quantity > 10)
                        <div class="card-stock"><i class="fas fa-box"></i> Stock: {{ $item->stock_quantity }}</div>
                    @elseif($item->stock_quantity > 0)
                        <div class="card-stock low"><i class="fas fa-exclamation-circle"></i> Only {{ $item->stock_quantity }} left!</div>
                    @else
                        <div class="card-stock out"><i class="fas fa-times-circle"></i> Out of Stock</div>
                    @endif
                </div>

            </div>
        @empty
            <div class="empty">
                <i class="fas fa-star"></i>
                <p>No best selling products available yet.</p>
            </div>
        @endforelse

    </div>
</div>

</body>
</html>