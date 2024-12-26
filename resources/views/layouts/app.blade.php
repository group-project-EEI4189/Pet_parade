<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Pet Parade</h1>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>© 2024 Pet Parade</p>
    </footer>
</body>
</html>
