@extends('layouts.app')
@section('title', 'Add New Pet')
@section('content')
<div class="container">
    <h1>Add Pet</h1>
    <form method="POST" action="{{ route('pets.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Breed</label>
        <input type="text" name="breed" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Description</label>
        <textarea name="description" required></textarea>

        <label>Upload Image</label>
        <input type="file" name="image" required>

        <button type="submit">Save</button>
    </form>
</div>
@endsection   


