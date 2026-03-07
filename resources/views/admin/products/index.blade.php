<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Products</title>
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

        .admin-navbar a {
            color: white;
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header-section h2 {
            font-size: 2rem;
            color: #333;
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

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        table th {
            padding: 1.25rem;
            text-align: left;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 1.25rem;
            border-bottom: 1px solid #dee2e6;
        }

        table tbody tr {
            transition: background-color 0.2s;
        }

        table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge {
            display: inline-block;
            padding: 0.5rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .badge-cat {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-dog {
            background: #fff3e0;
            color: #f57c00;
        }

        .btn-group {
            display: flex;
            gap: 0.5rem;
        }

        .btn-edit, .btn-delete {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            font-size: 0.875rem;
        }

        .btn-edit {
            background: #e7f3ff;
            color: #0066cc;
        }

        .btn-edit:hover {
            background: #0066cc;
            color: white;
        }

        .btn-delete {
            background: #ffe7e7;
            color: #cc0000;
        }

        .btn-delete:hover {
            background: #cc0000;
            color: white;
        }
    </style>
</head>
<body>

<div class="admin-navbar">
    <h1>
        <i class="fas fa-cube"></i>
        PETPARADE Admin
    </h1>
    <div style="display:flex; align-items:center; gap:1rem;">
        <?php $pending = \App\Models\Order::where('status', 'pending')->count(); ?>
        <a href="{{ route('admin.orders.index') }}">
            <i class="fas fa-receipt"></i> Orders
            @if($pending)
                <span style="background:#ff6b81; padding:2px 8px; border-radius:12px;">{{ $pending }}</span>
            @endif
        </a>
        <a href="{{ route('shop') }}"><i class="fas fa-arrow-left"></i> Back to Shop</a>
    </div>
</div>

<div class="container">

    <div class="header-section">
        <h2>Products</h2>

        <div style="display:flex; gap:0.75rem; align-items:center; flex-wrap:wrap;">

            <a href="{{ route('admin.orders.index') }}" class="btn-add" style="background:linear-gradient(135deg,#ff9aa2,#ff6b81);">
                <i class="fas fa-receipt"></i> View Orders
            </a>

            <a href="{{ route('admin.products.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Add New Product
            </a>

            <!-- ADDED -->
            <a href="{{ route('admin.pets.index') }}" class="btn-add" style="background:linear-gradient(135deg,#56ab2f,#a8e063);">
                <i class="fas fa-dog"></i> Manage Pets
            </a>

            <!-- ADDED -->
            <a href="{{ route('admin.adoptions.indexadoption') }}" class="btn-add" style="background:linear-gradient(135deg,#ff758c,#ff7eb3);">
                <i class="fas fa-heart"></i> Manage Adoptions
            </a>

        </div>
    </div>

    @if($products->count())
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Pet Type</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>#{{ $product->id }}</td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>{{ $product->subcategory->category->name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $product->pet_type === 'cat' ? 'badge-cat' : 'badge-dog' }}">
                                {{ ucfirst($product->pet_type) }}
                            </span>
                        </td>
                        <td>${{ number_format($product->price,2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.products.edit',$product) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.products.destroy',$product) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
</body>
</html>