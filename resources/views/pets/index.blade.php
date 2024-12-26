@extends('layout.app')

@section('content')
<div class="container">
    <h1>Pets List</h1>
    <a href="{{ route('pets.create') }}" class="btn btn-primary">Add New Pet</a>

    <table class="table">
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
            @foreach ($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->age }}</td>
                <td>{{ $pet->description }}</td>
                <td><img src="{{ asset('storage/' . $pet->image) }}" width="70"></td>
                <td>
                    <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
