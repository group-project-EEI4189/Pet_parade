<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet Tip — PetParade Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f5f7fa; color: #333; }

        .admin-navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 1.5rem 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex; justify-content: space-between; align-items: center;
        }
        .admin-navbar h1 { font-size: 1.8rem; display: flex; align-items: center; gap: 1rem; }
        .admin-navbar a  { color: white; text-decoration: none; }

        .container { max-width: 700px; margin: 2rem auto; padding: 2rem; }

        .form-card {
            background: white; border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08); padding: 2rem;
        }
        .form-card h2 { margin-bottom: 1.5rem; color: #333; display: flex; align-items: center; gap: 0.75rem; }

        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #495057; font-size: 0.95rem; }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%; padding: 0.75rem;
            border: 1px solid #dee2e6; border-radius: 6px;
            font-family: inherit; font-size: 1rem; transition: border-color 0.2s;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none; border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }
        .form-group textarea { min-height: 160px; resize: vertical; }

        /* Pet Type Selector */
        .pet-type-selector { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; }

        .pet-option {
            border: 2px solid #dee2e6; border-radius: 10px;
            padding: 1rem; text-align: center; cursor: pointer; transition: all 0.2s;
        }
        .pet-option input[type="radio"] { display: none; }
        .pet-option .emoji  { font-size: 2rem; display: block; margin-bottom: 0.4rem; }
        .pet-option .label  { font-weight: 700; font-size: 0.9rem; color: #555; }
        .pet-option.cat:has(input:checked)  { border-color: #1976d2; background: #e3f2fd; }
        .pet-option.dog:has(input:checked)  { border-color: #f57c00; background: #fff3e0; }
        .pet-option.both:has(input:checked) { border-color: #8e24aa; background: #f3e5f5; }

        /* Category Pills */
        .category-selector { display: flex; gap: 0.6rem; flex-wrap: wrap; }

        .cat-option {
            border: 2px solid #dee2e6; border-radius: 30px;
            padding: 0.5rem 1.1rem; cursor: pointer; transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 0.4rem;
            font-weight: 600; font-size: 0.9rem; color: #555;
        }
        .cat-option input[type="radio"] { display: none; }
        .cat-option.nutrition:has(input:checked) { border-color: #43a047; background: #e8f5e9; color: #43a047; }
        .cat-option.health:has(input:checked)    { border-color: #e53935; background: #ffebee; color: #e53935; }
        .cat-option.grooming:has(input:checked)  { border-color: #8e24aa; background: #f3e5f5; color: #8e24aa; }
        .cat-option.training:has(input:checked)  { border-color: #1e88e5; background: #e3f2fd; color: #1e88e5; }
        .cat-option.general:has(input:checked)   { border-color: #fb8c00; background: #fff3e0; color: #fb8c00; }

        .form-actions {
            display: flex; gap: 1rem; margin-top: 2rem;
            padding-top: 1.5rem; border-top: 1px solid #dee2e6;
        }

        .btn {
            flex: 1; padding: 0.75rem 1.5rem; border: none; border-radius: 6px;
            cursor: pointer; font-weight: 600; text-decoration: none; transition: all 0.2s;
            display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
        }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 16px rgba(102,126,234,0.4); }
        .btn-secondary { background: #e9ecef; color: #495057; }
        .btn-secondary:hover { background: #dee2e6; }

        .form-errors {
            background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24;
            padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem;
        }
        .form-errors ul { margin: 0; padding-left: 1.5rem; }
        .form-errors li { margin: 0.5rem 0; }
    </style>
</head>
<body>

<div class="admin-navbar">
    <h1><i class="fas fa-cube"></i> PETPARADE Admin</h1>
    <a href="{{ route('admin.tips.index') }}"><i class="fas fa-arrow-left"></i> Back to Tips</a>
</div>

<div class="container">
    <div class="form-card">
        <h2><i class="fas fa-lightbulb" style="color:#f7971e;"></i> Add Pet Tip</h2>

        @if($errors->any())
            <div class="form-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.tips.store') }}" method="POST">
            @csrf

            {{-- Pet Type --}}
            <div class="form-group">
                <label>For Pet Type *</label>
                <div class="pet-type-selector">
                    <label class="pet-option cat">
                        <input type="radio" name="pet_type" value="cat" {{ old('pet_type') == 'cat' ? 'checked' : '' }} required>
                        <span class="emoji">🐱</span>
                        <span class="label">Cats</span>
                    </label>
                    <label class="pet-option dog">
                        <input type="radio" name="pet_type" value="dog" {{ old('pet_type') == 'dog' ? 'checked' : '' }}>
                        <span class="emoji">🐶</span>
                        <span class="label">Dogs</span>
                    </label>
                    <label class="pet-option both">
                        <input type="radio" name="pet_type" value="both" {{ old('pet_type') == 'both' ? 'checked' : '' }}>
                        <span class="emoji">🐾</span>
                        <span class="label">Both</span>
                    </label>
                </div>
            </div>

            {{-- Category --}}
            <div class="form-group">
                <label>Category *</label>
                <div class="category-selector">
                    <label class="cat-option nutrition">
                        <input type="radio" name="category" value="nutrition" {{ old('category') == 'nutrition' ? 'checked' : '' }} required>
                        <i class="fas fa-carrot"></i> Nutrition
                    </label>
                    <label class="cat-option health">
                        <input type="radio" name="category" value="health" {{ old('category') == 'health' ? 'checked' : '' }}>
                        <i class="fas fa-heartbeat"></i> Health
                    </label>
                    <label class="cat-option grooming">
                        <input type="radio" name="category" value="grooming" {{ old('category') == 'grooming' ? 'checked' : '' }}>
                        <i class="fas fa-cut"></i> Grooming
                    </label>
                    <label class="cat-option training">
                        <input type="radio" name="category" value="training" {{ old('category') == 'training' ? 'checked' : '' }}>
                        <i class="fas fa-graduation-cap"></i> Training
                    </label>
                    <label class="cat-option general">
                        <input type="radio" name="category" value="general" {{ old('category') == 'general' ? 'checked' : '' }}>
                        <i class="fas fa-star"></i> General
                    </label>
                </div>
            </div>

            {{-- Title --}}
            <div class="form-group">
                <label for="title">Tip Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. How to Keep Your Cat Hydrated" required>
            </div>

            {{-- Body --}}
            <div class="form-group">
                <label for="body">Tip Content *</label>
                <textarea id="body" name="body" placeholder="Write your pet care tip here...">{{ old('body') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-lightbulb"></i> Publish Tip
                </button>
                <a href="{{ route('admin.tips.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
