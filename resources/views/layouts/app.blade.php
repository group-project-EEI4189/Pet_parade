<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pet Parade Admin')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="logo-brand">
            <img src="{{ asset('HomePageImages/Logo.png') }}" alt="Logo">
            <span>Pet Parade Admin</span>
        </div>
        <nav>
            <a href="{{ route('pets.index') }}">Dashboard</a>
            <a href="{{ route('pets.create') }}">Add Pet</a>
        </nav>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
