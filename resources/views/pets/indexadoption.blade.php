@extends('layouts.app')

@section('title', 'Manage Adoptions')

@section('content')
<div class="container">
    <h1>Adoption Requests</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet ID</th>
                <th>Adopter Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptions as $adoption)
                <tr>
                    <td>{{ $adoption->id }}</td>
                    <td>{{ $adoption->pet_id }}</td>
                    <td>{{ $adoption->name }}</td>
                    <td>{{ $adoption->email }}</td>
                    <td>{{ $adoption->address }}</td>
                    <td>{{ $adoption->phone }}</td>
                    <td>
                        <form method="POST" action="{{ route('adoptions.destroy', $adoption->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
