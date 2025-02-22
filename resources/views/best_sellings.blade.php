<!-- resources/views/best-sellings.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade - Best Sellings</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6e6;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .header {
            padding: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .nav {
            margin: 20px 0;
        }
        .nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .nav a.active {
            color: #ffcc66;
        }
        .content {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .section {
            margin: 0 50px;
            text-align: center;
        }
        .section h2 {
            margin-bottom: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 150px);
            grid-gap: 20px;
            justify-content: center;
        }
        .item {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            background-color: #ff9999;
            border: 2px solid black;
        }
        .footer {
            padding: 20px;
            background-color: #f2f2f2;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    @include('navbar')

    
        <h1>Best Sellings</h1>
    </div>
    <div class="content">
        <div class="section">
            <h2>Cat Products</h2>
            <div class="grid">
                <div class="item" contenteditable="true" style="background-color: #ff9999;">01</div>
                <div class="item" contenteditable="true" style="background-color: #6699ff;">02</div>
                <div class="item" contenteditable="true" style="background-color: #66cc99;">03</div>
                <div class="item" contenteditable="true" style="background-color: #cccccc;">04</div>
                <div class="item" contenteditable="true" style="background-color: #ffcc99;">05</div>
                <div class="item" contenteditable="true" style="background-color: #99ffff;">06</div>
            </div>
            <div class="products-container">
                
        
        
            </div>
        </div>
        <div class="section">
            <h2>Dog Products</h2>
            <div class="grid">
                <div class="item" style="background-color: #cc6699;">01</div>
                <div class="item" style="background-color: #ff99ff;">02</div>
                <div class="item" style="background-color: #ccff99;">03</div>
                <div class="item" style="background-color: #99ccff;">04</div>
                <div class="item" style="background-color: #ffcc66;">05</div>
                <div class="item" style="background-color: #cc9999;">06</div>
            </div>
            <div class="products-container">
            
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; Pet Parade</p>
        <p>Swipe.Shop.Snuggle</p>
        <div>
            <a href="#">Terms & Conditions</a> | 
            <a href="#">Privacy Policy</a> | 
            <a href="#">Contact Us</a>
        </div>
    </div>

</body>
</html>
