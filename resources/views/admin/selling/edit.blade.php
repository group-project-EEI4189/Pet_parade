<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Best Seller</title>
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

        .container {
            max-width: 700px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .form-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            padding: 2rem;
        }

        .form-card h2 {
            margin-bottom: 1.5rem;
            color: #333;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-group { margin-bottom: 1.5rem; }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Pet Type Selector */
        .pet-type-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .pet-option {
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 1.2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .pet-option input[type="radio"] { display: none; }
        .pet-option .emoji { font-size: 2.5rem; display: block; margin-bottom: 0.5rem; }
        .pet-option .label { font-weight: 700; font-size: 1rem; color: #555; }

        .pet-option.cat:has(input:checked) { border-color: #1976d2; background: #e3f2fd; }
        .pet-option.dog:has(input:checked) { border-color: #f57c00; background: #fff3e0; }

        /* Image Section */
        .current-image-box {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .current-image-box img {
            width: 100%;
            max-height: 240px;
            object-fit: cover;
        }

        .current-image-box .img-label {
            padding: 0.6rem 1rem;
            background: #f8f9fa;
            font-size: 0.85rem;
            color: #666;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .image-upload-zone {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
            position: relative;
        }

        .image-upload-zone:hover { border-color: #667eea; background: #f8f0ff; }

        .image-upload-zone input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .image-upload-zone i { font-size: 2rem; color: #adb5bd; margin-bottom: 0.5rem; display: block; }
        .image-upload-zone p { color: #888; font-size: 0.9rem; }
        .image-upload-zone span { color: #667eea; font-weight: 600; }

        #newImagePreviewBox {
            margin-top: 1rem;
            display: none;
            text-align: center;
        }

        #newImagePreview {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            object-fit: cover;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #dee2e6;
        }

        .btn {
            flex: 1;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary { background: #e9ecef; color: #495057; }
        .btn-secondary:hover { background: #dee2e6; }

        .form-errors {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        .form-errors ul { margin: 0; padding-left: 1.5rem; }
        .form-errors li { margin: 0.5rem 0; }
    </style>
</head>
<body>

<div class="admin-navbar">
    <h1>
        <i class="fas fa-cube"></i>
        PETPARADE Admin
    </h1>
    <a href="{{ route('admin.selling.index') }}">
        <i class="fas fa-arrow-left"></i> Back to Best Sellers
    </a>
</div>

<div class="container">
    <div class="form-card">
        <h2><i class="fas fa-edit" style="color:#667eea;"></i> Edit Best Seller</h2>

        @if($errors->any())
            <div class="form-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.selling.update', $bestSeller) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Pet Type --}}
            <div class="form-group">
                <label>Pet Type *</label>
                <div class="pet-type-selector">
                    <label class="pet-option cat">
                        <input type="radio" name="pet_type" value="cat" {{ $bestSeller->pet_type == 'cat' ? 'checked' : '' }} required>
                        <span class="emoji">🐱</span>
                        <span class="label">Cat</span>
                    </label>
                    <label class="pet-option dog">
                        <input type="radio" name="pet_type" value="dog" {{ $bestSeller->pet_type == 'dog' ? 'checked' : '' }}>
                        <span class="emoji">🐶</span>
                        <span class="label">Dog</span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" value="{{ $bestSeller->name }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Price ($) *</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" value="{{ $bestSeller->price }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stock Quantity *</label>
                    <input type="number" id="stock" name="stock" min="0" value="{{ $bestSeller->stock }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $bestSeller->description }}</textarea>
            </div>

            {{-- Current Image + Replace --}}
            <div class="form-group">
                <label>Product Image</label>

                @if($bestSeller->image)
                    <div class="current-image-box">
                        <img src="{{ asset('storage/' . $bestSeller->image) }}" alt="{{ $bestSeller->name }}">
                        <div class="img-label"><i class="fas fa-image"></i> Current image — upload below to replace</div>
                    </div>
                @endif

                <div class="image-upload-zone" id="uploadZone">
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewNewImage(event)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Drag & drop or <span>browse to replace image</span></p>
                    <p style="font-size:0.8rem; margin-top:0.3rem; color:#bbb;">JPG, PNG, WEBP — max 2MB</p>
                </div>

                <div id="newImagePreviewBox">
                    <img id="newImagePreview" src="" alt="New image preview">
                    <p style="font-size:0.8rem; color:#888; margin-top:0.5rem;">New image preview</p>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Update Best Seller
                </button>
                <a href="{{ route('admin.selling.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewNewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('newImagePreview').src = e.target.result;
            document.getElementById('newImagePreviewBox').style.display = 'block';
            document.getElementById('uploadZone').style.borderColor = '#667eea';
        };
        reader.readAsDataURL(file);
    }
</script>

</body>
</html>
