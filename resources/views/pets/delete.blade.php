@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Confirm Delete</h1>
    <p>Are you sure you want to delete {{ $pet->breed }}?</p>

    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete</button>
        <a href="{{ route('pets.index') }}">Cancel</a>
    </form>
</div>
@endsection
