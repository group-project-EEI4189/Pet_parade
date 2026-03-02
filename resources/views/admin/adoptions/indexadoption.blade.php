<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Adoptions – Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f4f6fb;
            margin: 0;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 2.5rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 14px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.1);
        }

        h3 {
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f1f3f8;
        }

        th, td {
            padding: 0.9rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 0.95rem;
        }

        th {
            font-weight: 700;
        }

        tr:hover {
            background: #fafafa;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 0.45rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-delete:hover {
            opacity: 0.9;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            margin-bottom: 1.2rem;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2>Pet Parade – Admin</h2>
    <span>Manage Adoptions</span>
</div>

<div class="container">
    <h3>Adoption Requests</h3>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Pet</th>
                <th>Adopter Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @forelse($adoptions as $adoption)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    #{{ $adoption->pet_id }} –
                    {{ $adoption->pet->breed ?? 'N/A' }}
                </td>

                <td>{{ $adoption->name }}</td>
                <td>{{ $adoption->email }}</td>
                <td>{{ $adoption->phone }}</td>

                <td>
                    <form action="{{ route('admin.adoptions.destroy', $adoption->id) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this adoption request?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No adoption requests found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>