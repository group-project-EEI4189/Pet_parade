<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="home-up">
        <header class="home-header">
            <div class="head">
                <div class="logo-brand">
                    <div class="logo"><img src="{{ asset('HomePageImages/Logo.png') }}" alt="Logo"></div>
                    <div class="brand">Pet Parade</div>
                </div>
                <nav>
                    <div class="main-nav">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="auth-nav-btn">
                        <ul>
                            @guest
                                <li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
                                <li><a href="{{ route('register') }}" class="signup-btn">Sign Up</a></li>
                            @else
                                <li><a href="{{ route('dashboard') }}" class="login-btn">Dashboard</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" class="signup-btn" 
                                       onclick="event.preventDefault(); 
                                       document.getElementById('logout-form').submit();">
                                       Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main class="home-main">
            <section class="hero-1">
                <div class="first-main">
                    <div class="first-main-content-left">
                        <img src="{{ asset('HomePageImages/FamilyWithPet.png') }}" alt="Family with pet">
                    </div>
                    <div class="first-main-content-right">
                        <h1>Swipe. <span class="word-shop">Shop</span>. Snuggle.</h1>
                        <a href="{{ route('adoption.index') }}" class="get-started-btn">Get Started</a>
                    </div>
                </div>
            </section>
            <section class="hero-2">
                <div class="second-main">
                    <div class="pawprint-perfect">
                        <img src="{{ asset('HomePageImages/PawPrint.png') }}" alt="Paw print">
                        <h4>Pawfect Pet Guarantee</h4>
                    </div>
                    <div class="features-home">
                        <a href="#" class="feature-box">
                            <img src="{{ asset('HomePageImages/PawHome.png') }}" alt="A paw home">
                            <p>Pets & Pro Tips Corner</p>
                        </a>
                        <a href="#" class="feature-box">
                            <img src="{{ asset('HomePageImages/ManWithPet.png') }}" alt="A man with a pet">
                            <p>Showcase</p>
                        </a>
                        <a href="#" class="feature-box">
                            <img src="{{ asset('HomePageImages/TwoPets.png') }}" alt="Two pets together">
                            <p>Best Selling</p>
                        </a>
                        <a href="{{ route('adoption.index') }}" class="feature-box">
                            <img src="{{ asset('HomePageImages/Heart.png') }}" alt="Paw with Heart">
                            <p>Adopt a pet</p>
                        </a>
                    </div>
                    <div class="hand-image">
                        <img src="{{ asset('HomePageImages/HandHolding.png') }}" alt="Hand holding a pet">
                    </div>
                </div>
            </section> 
        </main>
    </div>   
    <div class="home-down">       
        <div class="third-main">
            <h1>Ready to Pamper Your Pets?</h1>
            <p>Discover top-quality pet foods, stylish accessories, fun toys and medicines at</p>
            <p>Pet Parade to keep your furry friends happy and healthy.</p>
        </div>
        <div class="tail">
            <a href="{{ route('terms') }}">Terms & Conditions</a>
            <a href="{{ route('privacy') }}">Privacy Policy</a>
        </div>
    </div>
</body>
</html>
