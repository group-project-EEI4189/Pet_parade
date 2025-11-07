<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head section: meta tags, title, Bootstrap, FontAwesome, custom styles, Vite assets -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETPARADE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .navbar-brand { font-weight: bold; font-size: 1.5rem; color: #ff9800 !important; }
        .navbar { box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        footer { background: #222; color: #fff; padding: 2rem 0; margin-top: 3rem; }
        .footer-links a { color: #ff9800; margin-right: 1rem; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navigation bar: main site navigation with icons -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="/">
                <i class="fa-solid fa-paw"></i> PETPARADE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/shop"><i class="fa-solid fa-store"></i> Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cart"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="/orders"><i class="fa-solid fa-box"></i> My Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/products"><i class="fa-solid fa-user-shield"></i> Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content section: page-specific content will be injected here -->
    <main>
        @yield('content')
    </main>

    <!-- Footer: site links, contact info, social icons -->
    <footer class="text-center">
        <div class="container">
            <div class="footer-links mb-2">
                <a href="/shop">Shop</a>
                <a href="/cart">Cart</a>
                <a href="/orders">Orders</a>
                <a href="/admin/products">Admin</a>
            </div>
            <div>
                <span>Contact: info@petparade.com | </span>
                <span>Follow us:
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </span>
            </div>
            <div class="mt-2">&copy; {{ date('Y') }} PETPARADE. All rights reserved.</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
