<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tip->title }} — PetParade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f5f7fa; color: #333; }

        .shop-navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 1.2rem 2rem;
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .shop-navbar h1 { font-size: 1.6rem; display: flex; align-items: center; gap: 0.75rem; }
        .shop-navbar a  { color: white; text-decoration: none; font-weight: 600; }

        .container { max-width: 800px; margin: 2.5rem auto; padding: 0 2rem; }

        .breadcrumb {
            font-size: 0.9rem; color: #888; margin-bottom: 1.5rem;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .breadcrumb a:hover { text-decoration: underline; }

        .tip-card {
            background: white; border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden;
        }

        /* coloured top bar per category */
        .tip-card.nutrition { border-top: 5px solid #43a047; }
        .tip-card.health    { border-top: 5px solid #e53935; }
        .tip-card.grooming  { border-top: 5px solid #8e24aa; }
        .tip-card.training  { border-top: 5px solid #1e88e5; }
        .tip-card.general   { border-top: 5px solid #fb8c00; }

        .tip-header {
            padding: 2rem 2rem 1.25rem;
            display: flex; align-items: flex-start; gap: 1.25rem;
        }

        .tip-icon { width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; flex-shrink: 0; }
        .tip-icon.nutrition { background: #e8f5e9; color: #43a047; }
        .tip-icon.health    { background: #ffebee; color: #e53935; }
        .tip-icon.grooming  { background: #f3e5f5; color: #8e24aa; }
        .tip-icon.training  { background: #e3f2fd; color: #1e88e5; }
        .tip-icon.general   { background: #fff3e0; color: #fb8c00; }

        .tip-header-meta { flex: 1; }

        .tip-category-label {
            font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 1px; color: #888; margin-bottom: 0.4rem;
        }

        .tip-title { font-size: 1.75rem; font-weight: 800; color: #222; line-height: 1.3; }

        .tip-badges { display: flex; gap: 0.5rem; margin-top: 0.75rem; flex-wrap: wrap; }

        .pet-badge { font-size: 0.82rem; font-weight: 700; padding: 0.3rem 0.85rem; border-radius: 20px; }
        .pet-badge.cat  { background: #e3f2fd; color: #1565c0; }
        .pet-badge.dog  { background: #fff3e0; color: #e65100; }
        .pet-badge.both { background: #f3e5f5; color: #6a1b9a; }

        .category-badge { font-size: 0.82rem; font-weight: 700; padding: 0.3rem 0.85rem; border-radius: 20px; background: #f1f3f5; color: #555; }

        .divider { border: none; border-top: 1px solid #f0f0f0; margin: 0 2rem; }

        .tip-body {
            padding: 1.75rem 2rem;
            font-size: 1rem; color: #444; line-height: 1.85;
            white-space: pre-line;
        }

        .tip-actions {
            padding: 1.25rem 2rem;
            border-top: 1px solid #f0f0f0;
            display: flex; gap: 0.75rem; align-items: center;
        }

        .btn {
            padding: 0.65rem 1.3rem; border-radius: 8px; font-weight: 600; font-size: 0.9rem;
            text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;
            border: none; cursor: pointer; transition: all 0.2s;
        }

        .btn-back   { background: #e9ecef; color: #495057; }
        .btn-back:hover { background: #dee2e6; }

        .btn-edit   { background: #e7f3ff; color: #0066cc; }
        .btn-edit:hover { background: #0066cc; color: white; }

        .btn-delete { background: #ffe7e7; color: #cc0000; }
        .btn-delete:hover { background: #cc0000; color: white; }

        @media (max-width: 600px) {
            .tip-header { flex-direction: column; }
            .tip-title  { font-size: 1.4rem; }
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
        <a href="{{ route('tips.index') }}">Pet Tips</a>
        <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
        <span>{{ $tip->title }}</span>
    </div>

    @php
        $cat = strtolower($tip->category ?? 'general');
        $iconMap = ['nutrition' => 'fa-carrot', 'health' => 'fa-heartbeat', 'grooming' => 'fa-cut', 'training' => 'fa-graduation-cap', 'general' => 'fa-star'];
        $icon = $iconMap[$cat] ?? 'fa-star';
    @endphp

    <div class="tip-card {{ $cat }}">

        <div class="tip-header">
            <div class="tip-icon {{ $cat }}"><i class="fas {{ $icon }}"></i></div>
            <div class="tip-header-meta">
                <div class="tip-category-label">{{ ucfirst($cat) }}</div>
                <div class="tip-title">{{ $tip->title }}</div>
                <div class="tip-badges">
                    @if($tip->pet_type === 'cat')
                        <span class="pet-badge cat">🐱 For Cats</span>
                    @elseif($tip->pet_type === 'dog')
                        <span class="pet-badge dog">🐶 For Dogs</span>
                    @else
                        <span class="pet-badge both">🐾 Cats & Dogs</span>
                    @endif
                    <span class="category-badge"><i class="fas {{ $icon }}"></i> {{ ucfirst($cat) }}</span>
                </div>
            </div>
        </div>

        <hr class="divider">

        <div class="tip-body">{{ $tip->body }}</div>

        <div class="tip-actions">
            <a href="{{ route('tips.index') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Back to Tips
            </a>

            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.tips.edit', $tip) }}" class="btn btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.tips.destroy', $tip) }}" method="POST" style="margin:0;">
                        @csrf @method('DELETE')
                        <button class="btn btn-delete" onclick="return confirm('Delete this tip?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                @endif
            @endauth
        </div>

    </div>

</div>
</body>
</html>
