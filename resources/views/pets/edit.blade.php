@extends('layouts.app')
@section('title', 'Edit Pet Details')
@section('content')
<div class="container">
    <h1>Edit Pet</h1>
    <form method="POST" action="{{ route('pets.update', $pet->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Breed</label>
        <input type="text" name="breed" value="{{ $pet->breed }}" required>

        <label>Age</label>
        <input type="number" name="age" value="{{ $pet->age }}" required>

        <label>Description</label>
        <textarea name="description" required>{{ $pet->description }}</textarea>

        <label>Upload New Image (optional)</label>
        <input type="file" name="image">

        <button type="submit">Update</button>
    </form>
</div>
@endsection
