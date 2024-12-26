@extends('layouts.adoptionFormLayout')

@section('content')
<div class="overlay" id="overlay"></div>

<div class="form-container" id="adoptForm">
    <span class="close-btn" id="closeForm">&times;</span>
    <h2>Adopt a Pet</h2>

    <form action="{{ route('adoption.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="pet_id" value="{{ $pet->id }}">

        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required>
        </div>

        <button type="submit" class="btn">Submit Request</button>
    </form>
</div>


<script>
    document.getElementById('closeForm').onclick = function() {
        let form = document.getElementById('adoptForm');
        let overlay = document.getElementById('overlay');
        form.style.animation = 'fadeOut 0.3s ease-in-out';
        overlay.style.animation = 'fadeOut 0.3s ease-in-out';

        setTimeout(() => {
            form.style.display = 'none';
            overlay.style.display = 'none';
        }, 250);
    };
</script>

@endsection
