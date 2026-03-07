@extends('layouts.adoptionFormLayout')

@section('content')

{{-- Overlay --}}
<div class="overlay" id="overlay"></div>

{{-- Adoption Form --}}
<div class="form-container" id="adoptForm">
    <span class="close-btn" id="closeForm">&times;</span>
    <h2>Adopt a Pet</h2>

    <form action="{{ route('adoption.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="pet_id" value="{{ $pet->id }}">

        <div class="form-group">
            <label>Your Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email Address:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" required>
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="phone" required>
        </div>

        <button type="submit" class="btn">Submit Request</button>
    </form>
</div>

{{-- SUCCESS POPUP --}}
@if(session('success'))
<div class="success-overlay" id="successPopup">
    <div class="success-box">
        <h3>🎉 Success!</h3>
        <p>{{ session('success') }}</p>
        <button onclick="closeSuccess()">OK</button>
    </div>
</div>
@endif

{{-- Scripts --}}
<script>
    // Close adoption form
    document.getElementById('closeForm').onclick = function () {
        document.getElementById('adoptForm').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    };

    // Close success popup
    function closeSuccess() {
        document.getElementById('successPopup').style.display = 'none';
        window.location.href = "{{ route('adoption.page') }}";
    }
</script>

{{-- Inline styling for success popup --}}
<style>
    .success-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .success-box {
        background: white;
        padding: 2rem;
        border-radius: 14px;
        text-align: center;
        max-width: 350px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        animation: pop 0.3s ease;
    }

    .success-box h3 {
        margin-bottom: 0.8rem;
        color: #28a745;
    }

    .success-box p {
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .success-box button {
        background: #667eea;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
    }

    .success-box button:hover {
        background: #5a67d8;
    }

    @keyframes pop {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>

@endsection