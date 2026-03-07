<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Add Pet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background:#f5f7fa;
            font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;
        }

        .navbar {
            background:linear-gradient(135deg,#667eea,#764ba2);
            color:white;
            padding:1.5rem 2rem;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .container {
            max-width:700px;
            margin:3rem auto;
            background:white;
            padding:2.5rem;
            border-radius:14px;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
        }

        h2 {
            margin-bottom:1.5rem;
            color:#333;
        }

        label {
            font-weight:600;
            margin-top:1rem;
            display:block;
            color:#555;
        }

        input, textarea {
            width:100%;
            padding:0.75rem;
            margin-top:0.4rem;
            border-radius:8px;
            border:1px solid #ddd;
            font-size:0.95rem;
        }

        textarea {
            resize:none;
            height:120px;
        }

        .btn {
            margin-top:1.8rem;
            background:linear-gradient(135deg,#667eea,#764ba2);
            color:white;
            border:none;
            padding:0.8rem 1.6rem;
            border-radius:10px;
            font-weight:600;
            cursor:pointer;
            transition:0.2s;
        }

        .btn:hover {
            transform:translateY(-2px);
            box-shadow:0 8px 16px rgba(102,126,234,0.4);
        }

        .back-link {
            display:inline-block;
            margin-top:1.5rem;
            text-decoration:none;
            color:#667eea;
            font-weight:600;
        }
    </style>
</head>
<body>

<!-- TOP BAR -->
<div class="navbar">
    <h1><i class="fas fa-paw"></i> Add New Pet</h1>
    <a href="{{ route('admin.pets.index') }}" style="color:white;text-decoration:none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<!-- FORM CARD -->
<div class="container">
    <h2>Pet Details</h2>

    <form action="{{ route('admin.pets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Breed</label>
        <input type="text" name="breed" placeholder="e.g. Golden Retriever" required>

        <label>Age</label>
        <input type="number" name="age" placeholder="Age in years" required>

        <label>Description</label>
        <textarea name="description" placeholder="Short description about the pet..." required></textarea>

        <label>Pet Image</label>
        <input type="file" name="image">

        <button type="submit" class="btn">
            <i class="fas fa-save"></i> Save Pet
        </button>
    </form>

    <a href="{{ route('admin.pets.index') }}" class="back-link">
        ← Back to Manage Pets
    </a>
</div>

</body>
</html>