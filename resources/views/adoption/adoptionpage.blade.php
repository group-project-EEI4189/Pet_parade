<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet - Pet Parade</title>
    <link rel="stylesheet" href="{{ asset('css/adoption.css') }}">
    <style>
    @keyframes slideIn {
        from {
            transform: translateX(120%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container header-content">
            <div class="logo-section">
                <img src="{{ asset('/images/HomePageImages/Logo.png') }}" alt="Pet Parade Logo" class="logo">
                <h1 class="brand">Pet Parade</h1>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="{{ route('shop.index') }}">Showcase</a></li>
                    <li><a href="#">Home</a></li>
                </ul>
            </nav>
            <div class="account-btn">
                <a href="" class="btn">My Account</a>
            </div>
        </div>
    </header>

    <main>
            @if(session('success'))
        <div id="successPopup" style="
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 14px 20px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            z-index: 9999;
            animation: slideIn 0.5s ease;
        ">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const popup = document.getElementById('successPopup');
                if (popup) popup.remove();
            }, 4000);
        </script>
    @endif
        <section class="hero-section">
            <div class="container text-center">
                <h2 class="hero-heading">Adopt a Pet</h2>
                <p class="subheading">Find your perfect companion</p>
            </div>
        </section>

        <section class="pets-showcase">
        <div class="container grid">
            @foreach($pets as $pet)
                <div class="pet-card">
                    <div class="pet-img">
                        <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->breed }}">
                    </div>
                    <div class="pet-details">
                        <p><strong>Breed:</strong> {{ $pet->breed }}</p>
                        <p><strong>Age:</strong> {{ $pet->age }} years</p>
                        <p>{{ $pet->description }}</p>
                    </div>
                    <div class="adopt-btn">
                        <a href="{{ route('adoption.form', ['id' => $pet->id]) }}" class="btna">Adopt Me</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="main-footer">
        <div class="container footer-content">
            <div class="footer-left">
                <div class="logo-brand">
                    <img src="{{ asset('/images/HomePageImages/Logo.png') }}" alt="Pet Parade Logo" class="footer-logo">
                    <div class="brand">Pet Parade</div>
                </div>
                <div>Swipe. Shop. Snuggle.</div>
            </div>
            <div class="footer-center">
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="footer-right">
                <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html> 