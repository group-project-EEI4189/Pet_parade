@extends('layouts.app')
@section('title', 'Manage Pets')
@section('content')
<div class="container">
    <h1>Pet List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->id }}</td>
                    <td><img src="{{ asset('HomePageImages/' . $pet->image) }}" alt="Pet Image" width="60"></td>
                    <td>{{ $pet->breed }}</td>
                    <td>{{ $pet->age }}</td>
                    <td>{{ $pet->description }}</td>
                    <td>
                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn-edit">Edit</a>
                        <form method="POST" action="{{ route('pets.destroy', $pet->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
