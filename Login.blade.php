<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .login_col1 {
            flex-basis: 40%;
            padding-left: 25px;
        }

        .login_col1 img {
            width: 100%;
            border-radius: 20px;
        }

        .login_col2 {
            flex-basis: 50%;
            border-radius: 10px;
            background-color: white;
        }

        .inputbox {
            padding-left: 20%;
            margin-top: 10px;
        }

        .inputbox input {
            width: 60%;
            background: transparent;
            border: 1px solid black;
            outline: none;
            border-radius: 10px;
            font-size: 14px;
            color: black;
            padding: 10px;
            transform: all 0.4s;
        }

        .btn {
            width: 20%;
            height: 40px;
            background-color: hotpink;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: white;
            border-radius: 40px;
            margin-left: 40%;
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
        .register {
            margin: 20px 0 15px;
            font-size: 14.6px;
            text-align: center;
        }

        .register p a {
            margin-left: 5px;
            color: #062330; 
            font-weight: bold;
            text-decoration: none;
        }

        .register p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body style="background-color: pink;">
    <div class="row">
        <div class="login_col1">
            <h5 style="margin-bottom: 40px;padding-top:20px; margin-left: 40px;"> <img src="{{URL('images/small-icon.png')}}"
                    style="height:20px;width:20px;">Pet Parade</h5>
            <p style="color: hotpink; font-size: 50px;font-weight: bold;margin-left: 30px;">Happiness</p>
            <p style="font-size: 50px;font-weight:bold;margin-left: 30px;">Starts Here</p>
            <img src="{{URL('images/icon image.png')}}" height="500px" style="margin-left: 100px;"/>
        </div>

        <div class="login_col2">
            <form action="login.php" method="POST">

                <img src="{{URL('images/pawpad.png')}}"
                    style="height:130px;width:130px; margin: 60px 40%;">
                <h5 style="text-align: center; font-size: 20px; margin-top: -100px;">Login</h5>
                <button style="border-radius:10px;margin-left: 40%;height: 30px;">
                    <img src="https://clipartcraft.com/images/google-logo-png.png" style="height: 15px; width:20px;">
                    Sign in with google
                </button>
                <p style="text-align: center;">-OR-</p>

                <div class="inputbox">
                    <p>Email Address</p>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="inputbox">
                    <p>Password</p>
                    <input type="password" placeholder="password" name="password" required >
                </div>

                <button type="submit" class="btn">Sign In</button>
                <div class="register">
                    <p>Don't you have an account? <a href="/Signin.blade.php" style="color: hotpink;">
                            SignUp</a></p>
                </div>
            </form>

        </div>
    </div>
    </div>
</body>

</html>