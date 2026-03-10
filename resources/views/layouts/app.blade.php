<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETPARADE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #fffafa 0%, #fff6f8 100%);
            color: #333;
        }

        .navbar {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: #e89080 !important;
        }

        main {
            flex: 1;
        }

        footer {
            background: #fff;
            padding: 3rem 2rem;
            margin-top: 4rem;
            border-top: 1px solid #e0d7cf;
            text-align: center;
        }

        footer a {
            color: #e89080;
            text-decoration: none;
            margin: 0 1rem;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .footer-section {
            margin-bottom: 1.5rem;
        }

        .footer-section:last-child {
            margin-bottom: 0;
        }
        .inline{
            display: flex;
            justify-content: space-between;
        }
        .btn {
            width: 100%;
            height: 40px;
            background-color: #F2968F;
            cursor: pointer;
            font-size: 16px;
            font-weight: 400;
            color: white;
            border-radius: 30px;
            margin-right: 60%;
            margin-top: 10%;
            transition: all 0.2s;
            transform: translateY(-5px);
        } 
        .btn:hover {
            background: white;
            color: black;
        }

        .btn:active {
            transform: translateY(0px);
        }
        .btn1{
            width: 10%;
            height: 40px;
            background-color: #F2968F;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            flex: 5%
            border-radius: 30px;
            margin-top: 10px; 
        }
    </style>
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh;">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                </div>

                {{-- Menu --}}
                <div class="inline">
                    @auth
                        <span class="text-gray-700">Hi, {{ auth()->user()->name }}</span>  

                        <form method="POST" action="{{ url('/logout') }}">
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.products.index') }}" style="color: #fff" class="btn1">
                                         Admin Dashboard
                                    </a>
                                @endif
                            @endauth

                            @csrf
                            {{-- <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                Logout
                            </button> --}}
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Login
                        </a>
                        <a href="{{ url('/register') }}"
                            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                            Register
                        </a>

                    @endauth
                    <form method="POST" action="/logout">
                        @csrf
                        <button class=" btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fa-solid fa-paw"></i> PETPARADE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @php
                    $sessionCart = session('cart', []);
                    $cartCount = 0;
                    if (is_array($sessionCart)) {
                        foreach ($sessionCart as $it) {
                            $cartCount += $it['quantity'] ?? 0;
                        }
                    }
                    if (\Illuminate\Support\Facades\Auth::check()) {
                        $cartCount += \App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->sum(
                            'quantity',
                        );
                    }
                @endphp
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/shop"><i class="fa-solid fa-store"></i> Shop</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/cart"><i class="fa-solid fa-cart-shopping"></i>
                            Cart <span id="cart-count"
                                style="background:#ff6b81;color:#fff;padding:2px 8px;border-radius:12px;margin-left:6px;font-weight:700;">{{ $cartCount }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-cart-image" href="/cart" title="Go to cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container-fluid">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-section">
            <i class="fa-solid fa-paw" style="color: #e89080; margin-right: 0.5rem;"></i>
            <strong style="color: #e89080;">Pet Parade</strong>
        </div>
        <div class="footer-section">
            <a href="#"><strong>Terms & Conditions</strong></a> |
            <a href="#"><strong>Privacy Policy</strong></a> |
            <a href="#"><strong>Contact Us</strong></a>
        </div>
        <div class="footer-section" style="font-size: 0.9rem; color: #999;">
            Swipe.Shop.Snuggle
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
