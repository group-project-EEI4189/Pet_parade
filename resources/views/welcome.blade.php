<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Parade</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .home-up {
            background-color: #ffe3d3;
        }

        header {
            padding: 10px 0;
        }

        .head {
            width: 90%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            align-items: center;
        }

        .logo-brand {
            display: flex;
            align-items: center;
        }

        .logo img {
            margin-right: 8px;
        }

        .brand {
            color: #502710;
            font-weight: bold;
            letter-spacing: 1px;
        }

        nav {
            display: inline-flex;
            align-items: center;
        }

        .main-nav ul {
            display: flex;
            margin: 10px 300px 10px 280px;
        }

        .main-nav ul li {
            padding-right: 40px;
            list-style-type: none;
        }

        .main-nav ul li a {
            text-decoration: none;
            color: #502710;
            font-weight: 500;
        }

        .main-nav ul li a:hover {
            color: #f79628;
        }

        .auth-nav-btn ul {
            display: flex;
            margin: 5px 0;
        }

        .auth-nav-btn ul li {
            padding: 0 15px;
            list-style-type: none;
        }

        .auth-nav-btn ul li a {
            text-decoration: none;
            color: #502710;
            font-weight: 500;
        }

        .auth-nav-btn ul li a:hover {
            color: #dd8a75;
        }

        main {
            margin: 50px 100px 0 100px;
        }

        .first-main {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .first-main-content-left {
            flex: 1;
        }

        .first-main-content-left img {
            max-width: 180%;
            padding-left: 70px;
        }

        .first-main-content-right {
            flex: 3;
            margin-left: 200px;
        }

        .first-main-content-right h1 {
            font-size: 50px;
            color: #502710;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .word-shop {
            color: #dd8a75;
        }

        .get-started-btn {
            padding: 10px 20px;
            color: #ffffff;
            background-color: #dd8a75;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
        }

        .second-main {
            width: 90%;
            max-width: 1200px;
            margin: 20px 10% 0 10%;
            padding-top: 50px;
        }

        .pawprint-perfect img {
            max-width: 100%;
            padding: 0 35%;
        }

        .pawprint-perfect h4 {
            color: #522c16;
            font-size: 20px;
            padding: 0 34%;
            margin-top: -50px;
            margin-left: 0px;
        }

        .features-home {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin-top: 10%;
        }

        .feature-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #502710;
            text-align: center;
            text-decoration: none;
            height: auto;
            width: 100%;
            margin: 0 30px 50px 30px;
            padding: 10px 30px;
            background-color: #ffffff;
            border: 2px solid #ffe3d3;
            border-radius: 10px;
            box-shadow: 2px 2px #f5927a;
            z-index: 2;
        }

        .feature-box img {
            max-width: 100%;
        }

        .feature-box p {
            font-weight: bold;
            margin-top: 5px;
        }

        .hand-image img {
            margin-left: 83%;
            margin-top: -18%;
            z-index: 1;
        }

        .home-down {
            background-color: #ffede2;
            text-align: left;
            z-index: 2;
        }

        .third-main {
            width: 90%;
            max-width: 1200px;
            max-height: 1500px;
            margin-left: 100px;
            padding: 40px 20px;
        }

        .third-main h1 {
            color: #502710;
            width: 300px;
            margin-bottom: 20px;
        }

        .tail {
            display: flex;
            justify-content: center;
            gap: 30px;
            padding-bottom: 5px;
        }

        .tail a {
            color: #522c16;
            text-decoration: none;
        }
    </style>
</head>

<body class="home-up">
    <header class="home-header">
        <div class="head">
            <div class="logo-brand">
                <div class="logo"><img src="{{URL('images/HomepageImages/Logo.png')}}"></div>
                <div class="brand">Pet Parade</div>
            </div>
            <nav>
                <div class="main-nav">
                    
                </div >
                        @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                            <a
                                href="{{ url('/shop') }}"> Dashboard </a>
                            @else
                            <a
                                href="{{ route('login') }}"> Log in </a> &nbsp;&nbsp;

                            @if (Route::has('register'))
                            &nbsp;  <a 
                                href="{{ url('/register') }}"> Register</a>
                            @endif
                            @endauth
                        </nav>
                        @endif
                    </header>
            </nav>
        </div>
        
    </header>
    <main class="home-main">
        <section class="hero-1">
            <div class="first-main">
                <div class="first-main-content-left">
                    <img src="{{URL('images/HomepageImages/FamilyWithPet.png')}}" alt="Family with pet">
                </div>
                <div class="first-main-content-right">
                    <h1>Swipe. <span class="word-shop">Shop</span>. Snuggle.</h1>
                    <a href="#" class="get-started-btn">Get Started</a>
                </div>
            </div>
        </section>
        <section class="hero-2">
            <div class="second-main">
                <div class="pawprint-perfect">
                    <img src="{{URL('images/HomepageImages/PawPrint.png')}}" alt="Paw print">
                    <h4>Pawfect Pet Guarantee</h4>
                </div>
                <div class="features-home">
                    <a href="#" class="feature-box">
                        <img src="{{URL('images/HomepageImages/PawHome.png')}}" alt="A paw home">
                        <p>Pets & Pro Tips Corner</p>
                    </a>
                    <a href="{{ route('shop.index') }}" class="feature-box">
                        <img src="{{URL('images/HomepageImages/ManWithPet.png')}}" alt="A man with a pet">
                        <p>Showcase</p>
                    </a>
                    <a href="#" class="feature-box">
                        <img src="{{URL('images/HomepageImages/TwoPets.png')}}" alt="Two pets together">
                        <p>Best Selling</p>
                    </a>
                    <a href="{{ route('adoption.page') }}" class="feature-box">
                        <img src="{{URL('images/HomepageImages/Heart.png')}}" alt="Paw with Heart">
                        <p>Adopt a pet</p>
                    </a>
                </div>
                <div class="hand-image">
                    <img src="{{URL('images/HomepageImages/HandHolding.png')}}">
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
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>
</body>
</html>