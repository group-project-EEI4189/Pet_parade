<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin – Manage Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        /* Top Bar */
        .topbar {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h2 {
            margin: 0;
        }

        .topbar a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        /* Container */
        .container {
            max-width: 1100px;
            margin: 2.5rem auto;
            background: white;
            padding: 2rem;
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .btn-add {
            background: #667eea;
            color: white;
        }

        .btn-add:hover {
            background: #5a67d8;
        }

        .btn-adopt {
            background: #f59e0b;
            color: white;
        }

        .btn-adopt:hover {
            background: #d97706;
        }

        .btn-edit {
            background: #4caf50;
            color: white;
        }

        .btn-edit:hover {
            background: #43a047;
            box-shadow: 0 4px 10px rgba(76,175,80,0.4);
        }

        .btn-delete {
            background: #e53935;
            color: white;
        }

        .btn-delete:hover {
            background: #d32f2f;
            box-shadow: 0 4px 10px rgba(229,57,53,0.4);
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-size: 0.9rem;
        }

        thead {
            background: #f1f3f8;
        }

        tr:hover {
            background: #fafafa;
        }

        img {
            border-radius: 8px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<!-- Top Bar -->
<div class="topbar">
    <h2><i class="fas fa-dog"></i> Manage Pets</h2>
    <a href="{{ route('admin.products.index') }}">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>
</div>

<!-- Content -->
<div class="container">

    <!-- Action Buttons -->
    <div style="display:flex; gap:10px; margin-bottom:1rem;">
        <a href="{{ route('admin.pets.create') }}" class="btn btn-add">
            <i class="fas fa-plus"></i> Add New Pet
        </a>

        <a href="{{ route('adoption.page') }}" class="btn btn-adopt">
            <i class="fas fa-heart"></i> Go to Adoption
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->age }}</td>
                <td>{{ $pet->description }}</td>
                <td>
                    @if($pet->image)
                        <img src="{{ asset('storage/'.$pet->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.pets.edit', $pet->id) }}" class="btn btn-edit">
                            <i class="fas fa-pen"></i> Edit
                        </a>

                        <form action="{{ route('admin.pets.destroy', $pet->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete"
                                onclick="return confirm('Are you sure you want to delete this pet?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;">No pets found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>