<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Parade - Paws and Pro Tips Corner</title>
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
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .tip {
            width: 150px;
            height: 100px;
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
        }
        .tip-box {
    display: inline-block;
    width: 150px;
    height: 150px;
    margin: 10px;
    text-align: center;
    line-height: 50px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
    border: 2px solid black;
}

.tip-box:focus {
    outline: none;
    border: 2px solid blue;
    background-color: lightyellow;
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

    <div class="header">
        
        <h1>Paws and Pro Tips Corner</h1>
    </div>
    <div class="content">
        <div class="tip-box" contenteditable="true" style="background-color: #ff9999;">Tip 01</div>
        <div class="tip-box" contenteditable="true" style="background-color: #6699ff;">Tip 02</div>
        <div class="tip-box" contenteditable="true" style="background-color: #66cc99;">Tip 03</div>
        <div class="tip-box" contenteditable="true" style="background-color: #cccccc;">Tip 04</div>
        <div class="tip-box" contenteditable="true" style="background-color: #cc9999;">Tip 05</div>
        <div class="tip-box" contenteditable="true" style="background-color: #ffcc66;">Tip 06</div>
        <div class="tip-box" contenteditable="true" style="background-color: #ff99ff;">Tip 07</div>
        <div class="tip-box" contenteditable="true" style="background-color: #99ffff;">Tip 08</div>
        <div class="tip-box" contenteditable="true" style="background-color: #cc6699;">Tip 09</div>
        <div class="tip-box" contenteditable="true" style="background-color: #ffcc99;">Tip 10</div>
        <div class="tip-box" contenteditable="true" style="background-color: #ccff99;">Tip 11</div>
        <div class="tip-box" contenteditable="true" style="background-color: #99ccff;">Tip 12</div>
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
