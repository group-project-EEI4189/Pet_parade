<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
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

        .container {
            max-width: 700px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            padding: 2rem;
        }

        .form-card h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

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
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .image-preview {
            margin-top: 1rem;
            text-align: center;
        }

        .image-preview img {
            max-width: 200px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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

        .btn-secondary {
            background: #e9ecef;
            color: #495057;
        }

        .btn-secondary:hover {
            background: #dee2e6;
        }

        .form-errors {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        .form-errors ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .form-errors li {
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <div class="admin-navbar">
        <h1>
            <i class="fas fa-cube"></i>
            PETPARADE Admin
        </h1>
        <a href="{{ route('admin.products.index') }}" style="color: white; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="container">
        <div class="form-card">
            <h2><i class="fas fa-edit"></i> Edit Product</h2>

            @if($errors->any())
                <div class="form-errors">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Product Name *</label>
                        <input type="text" id="name" name="name" value="{{ $product->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pet_type">Pet Type *</label>
                        <select id="pet_type" name="pet_type" required>
                            <option value="cat" {{ $product->pet_type == 'cat' ? 'selected' : '' }}>🐱 Cat</option>
                            <option value="dog" {{ $product->pet_type == 'dog' ? 'selected' : '' }}>🐶 Dog</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="subcategory_id">Subcategory *</label>
                        <select id="subcategory_id" name="subcategory_id" required>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->category->name ?? '' }} - {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price ($) *</label>
                        <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="stock">Stock Quantity *</label>
                        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" id="image" name="image" accept="image/*">
                    </div>
                </div>

                @if($product->image)
                    <div class="image-preview">
                        <p style="color: #999; font-size: 0.9rem; margin-bottom: 0.5rem;">Current Image:</p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                    </div>
                @endif

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ $product->description }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Update Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
