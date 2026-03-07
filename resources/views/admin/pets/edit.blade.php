<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pet – Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6fb;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
        }

        .container {
            max-width: 700px;
            margin: 3rem auto;
            background: #fff;
            padding: 2.5rem;
            border-radius: 14px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.1);
        }

        h3 {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.3rem;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.4rem;
        }

        input, textarea {
            width: 100%;
            padding: 0.7rem;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        textarea {
            min-height: 120px;
        }

        img {
            width: 120px;
            border-radius: 10px;
            margin-top: 0.5rem;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.7rem 1.6rem;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-save {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-back {
            background: #eee;
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2>Pet Parade – Admin</h2>
    <a href="{{ route('admin.pets.index') }}" style="color:white;">← Back</a>
</div>

<div class="container">
    <h3>Edit Pet</h3>

    <form action="{{ route('admin.pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- BREED -->
        <div class="form-group">
            <label>Breed</label>
            <input type="text" name="breed" value="{{ $pet->breed }}" required>
        </div>

        <!-- AGE -->
        <div class="form-group">
            <label>Age (years)</label>
            <input type="number" name="age" value="{{ $pet->age }}" required>
        </div>

        <!-- DESCRIPTION -->
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" required>{{ $pet->description }}</textarea>
        </div>

        <!-- IMAGE -->
        <div class="form-group">
            <label>Change Image (optional)</label>
            <input type="file" name="image">

            @if($pet->image)
                <small>Current image:</small><br>
                <img src="{{ asset('storage/'.$pet->image) }}">
            @endif
        </div>

        <div class="btn-group">
            <a href="{{ route('admin.pets.index') }}" class="btn btn-back">Cancel</a>
            <button type="submit" class="btn btn-save">Update Pet</button>
        </div>
    </form>
</div>

</body>
</html>