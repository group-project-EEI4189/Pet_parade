@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Pet</h1>
    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Breed</label>
        <input type="text" name="breed" required>
        
        <label>Age</label>
        <input type="number" name="age" required>
        
        <label>Description</label>
        <textarea name="description" required></textarea>
        
        <label>Image</label>
        <input type="file" name="image" required>

        <button type="submit">Save</button>
    </form>
</div>
@endsection
