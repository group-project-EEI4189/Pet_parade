<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Tips — PetParade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #fdf6f4; color: #333; }

        /* ── Navbar ── */
        .shop-navbar {
            background: linear-gradient(135deg, #dd8a75 0%, #c9705a 100%);
            color: white; padding: 1.2rem 2rem;
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: 0 4px 12px rgba(221,138,117,0.3);
        }
        .shop-navbar h1 { font-size: 1.6rem; display: flex; align-items: center; gap: 0.75rem; }
        .shop-navbar a  { color: white; text-decoration: none; font-weight: 600; }

        /* ── Hero ── */
        .hero {
            background: linear-gradient(135deg, #dd8a75 0%, #e8a090 100%);
            color: white; text-align: center; padding: 3.5rem 2rem 4rem; position: relative; overflow: hidden;
        }
        .hero::before {
            content: ''; position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.07'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .hero h2 { font-size: 2.4rem; font-weight: 800; margin-bottom: 0.75rem; position: relative; }
        .hero p  { font-size: 1.1rem; opacity: 0.9; max-width: 560px; margin: 0 auto; position: relative; }

        /* ── Container ── */
        .container { max-width: 1100px; margin: 0 auto; padding: 2.5rem 2rem; }

        /* ── Tab Bar ── */
        .tab-bar { display: flex; gap: 0.5rem; margin-bottom: 2rem; flex-wrap: wrap; }
        .tab-btn {
            padding: 0.6rem 1.4rem; border-radius: 30px; border: 2px solid #f5ddd7;
            background: white; font-weight: 600; cursor: pointer; text-decoration: none;
            color: #c9705a; transition: all 0.2s; display: inline-flex; align-items: center;
            gap: 0.4rem; font-size: 0.95rem;
        }
        .tab-btn:hover      { border-color: #dd8a75; background: #fdf0ec; }
        .tab-btn.active     { border-color: #dd8a75; background: #dd8a75; color: white; }
        .tab-btn.cat.active { border-color: #c9705a; background: #c9705a; color: white; }
        .tab-btn.dog.active { border-color: #e8956a; background: #e8956a; color: white; }

        /* ── Tips Grid ── */
        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        /* ── Tip Card ── */
        .tip-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(221,138,117,0.1);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            border: 1px solid #f5ddd7;
            min-height: 380px;        /* ← tall cards */
        }
        .tip-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(221,138,117,0.2); }

        .tip-card.nutrition { border-top: 4px solid #7cad5a; }
        .tip-card.health    { border-top: 4px solid #dd8a75; }
        .tip-card.grooming  { border-top: 4px solid #c47a9a; }
        .tip-card.training  { border-top: 4px solid #e8a050; }
        .tip-card.general   { border-top: 4px solid #c9705a; }

        .tip-card-header { padding: 1.4rem 1.4rem 0.75rem; display: flex; align-items: center; gap: 0.75rem; }

        .tip-icon {
            width: 50px; height: 50px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; flex-shrink: 0;
        }
        .tip-icon.nutrition { background: #eef7e8; color: #7cad5a; }
        .tip-icon.health    { background: #fde8e2; color: #dd8a75; }
        .tip-icon.grooming  { background: #fae8f0; color: #c47a9a; }
        .tip-icon.training  { background: #fef3e2; color: #e8a050; }
        .tip-icon.general   { background: #fde8e2; color: #c9705a; }

        .tip-meta { flex: 1; }
        .tip-category {
            font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.8px; color: #c9a098; margin-bottom: 0.25rem;
        }
        .tip-title { font-size: 1.05rem; font-weight: 700; color: #3a2a26; line-height: 1.3; }

        /* ← taller body area */
        .tip-body {
            padding: 0.5rem 1.4rem 1.4rem;
            font-size: 0.93rem; color: #7a5a54;
            line-height: 1.8; flex: 1;
            min-height: 140px;
        }

        .tip-footer {
            padding: 1rem 1.4rem;
            border-top: 1px solid #fde8e2;
            display: flex; align-items: center; justify-content: space-between;
        }

        .pet-badge { font-size: 0.8rem; font-weight: 700; padding: 0.3rem 0.85rem; border-radius: 20px; }
        .pet-badge.cat  { background: #fde8e2; color: #c9705a; }
        .pet-badge.dog  { background: #fef3e2; color: #e8956a; }
        .pet-badge.both { background: #fae8f0; color: #c47a9a; }

        .tip-date { font-size: 0.8rem; color: #c9a098; }

        /* ── Empty State ── */
        .empty-state { text-align: center; padding: 5rem 2rem; color: #e8b5a8; grid-column: 1 / -1; }
        .empty-state i { font-size: 3.5rem; margin-bottom: 1rem; display: block; }
        .empty-state p { font-size: 1.1rem; color: #c9a098; }

        @media (max-width: 600px) {
            .tips-grid { grid-template-columns: 1fr; }
            .hero h2 { font-size: 1.8rem; }
            .tip-card { min-height: unset; }
        }
    </style>
</head>
<body>

<div class="shop-navbar">
    <h1><i class="fas fa-paw"></i> PETPARADE</h1>
    <a href="{{ route('shop') }}"><i class="fas fa-store"></i> Shop</a>
</div>

<div class="hero">
    <h2><i class="fas fa-lightbulb"></i> Pet Care Tips</h2>
    <p>Helpful advice to keep your cats and dogs happy, healthy, and thriving.</p>
</div>

<div class="container">

    {{-- Filter Tabs --}}
    <div class="tab-bar">
        <a href="{{ route('tips.index') }}" class="tab-btn {{ !request('filter') ? 'active' : '' }}">
            <i class="fas fa-th"></i> All
        </a>
        <a href="{{ route('tips.index', ['filter' => 'cat']) }}" class="tab-btn cat {{ request('filter') == 'cat' ? 'active' : '' }}">
            🐱 Cats
        </a>
        <a href="{{ route('tips.index', ['filter' => 'dog']) }}" class="tab-btn dog {{ request('filter') == 'dog' ? 'active' : '' }}">
            🐶 Dogs
        </a>
    </div>

    {{-- Tips Grid --}}
    <div class="tips-grid">
        @forelse($tips as $tip)
            @php
                $cat = strtolower($tip->category ?? 'general');
                $iconMap = [
                    'nutrition' => 'fa-carrot',
                    'health'    => 'fa-heartbeat',
                    'grooming'  => 'fa-cut',
                    'training'  => 'fa-graduation-cap',
                    'general'   => 'fa-star',
                ];
                $icon = $iconMap[$cat] ?? 'fa-star';
            @endphp
            <div class="tip-card {{ $cat }}">
                <div class="tip-card-header">
                    <div class="tip-icon {{ $cat }}"><i class="fas {{ $icon }}"></i></div>
                    <div class="tip-meta">
                        <div class="tip-category">{{ ucfirst($cat) }}</div>
                        <div class="tip-title">{{ $tip->title }}</div>
                    </div>
                </div>
                <div class="tip-body">{{ Str::limit($tip->body, 220) }}</div>
                <div class="tip-footer">
                    @if($tip->pet_type === 'cat')
                        <span class="pet-badge cat">🐱 For Cats</span>
                    @elseif($tip->pet_type === 'dog')
                        <span class="pet-badge dog">🐶 For Dogs</span>
                    @else
                        <span class="pet-badge both">🐾 Cats & Dogs</span>
                    @endif
                    <span class="tip-date">{{ $tip->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <i class="fas fa-lightbulb"></i>
                <p>No tips available yet.<br>Check back soon for helpful pet care advice!</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($tips->hasPages())
        <div style="margin-top: 2rem;">{{ $tips->withQueryString()->links() }}</div>
    @endif

</div>
</body>
</html>