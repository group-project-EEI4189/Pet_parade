<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet - Pet Parade</title>
    <link rel="stylesheet" href="{{ asset('css/adoption.css') }}">
</head>
<body>
    <header class="main-header">
        <div class="container header-content">
            <div class="logo-section">
                <img src="{{ asset('HomePageImages/Logo.png') }}" alt="Pet Parade Logo" class="logo">
                <h1 class="brand">Pet Parade</h1>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="{{ route('home') }}">Showcase</a></li>
                    <li><a href="#">Best Sellers</a></li>
                </ul>
            </nav>
            <div class="account-btn">
                <a href="" class="btn">My Account</a>
            </div>
        </div>
    </header>

    <main>
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
                        <a href="{{ route('adoption.form', ['id' => $pet->id]) }}" class="btn">Adopt</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="main-footer">
        <div class="container footer-content">
            <div class="footer-left">
                <img src="{{ asset('HomePageImages/Logo.png') }}" alt="Pet Parade Logo" class="footer-logo">
                <p>Swipe. Shop. Snuggle.</p>
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
