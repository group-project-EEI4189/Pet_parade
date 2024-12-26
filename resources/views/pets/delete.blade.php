@extends('layouts.app')
@section('title', 'Delete Pet')
@section('content')
<div class="container">
    <h1>Delete Pet</h1>
    <p>Are you sure you want to delete {{ $pet->breed }}?</p>
    <form method="POST" action="{{ route('pets.destroy', $pet->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete</button>
        <a href="{{ route('pets.index') }}">Cancel</a>
    </form>
</div>
@endsection
