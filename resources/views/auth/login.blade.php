<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="/css/app.css" rel="stylesheet">
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
            margin-top: 30px;
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
            background-color: #F2968F;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: white;
            border-radius: 40px;
            margin-left: 25%;
            margin-top: 5%;
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
            margin: 10px 0 15px;
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
<body style="background-color:#FFDDD2;">
        <!--------laeft---------------->
    <div class="row">
        <div class="login_col1">
            <h5 style="margin-bottom: 40px;padding-top:20px; margin-left: 50px;"> <img src="{{URL('images/small-icon.png')}}"
                    style="height:20px;width:20px;">Pet Parade</h5>
            <p style="color: hotpink; font-size: 50px;font-weight: bold;margin-left: 30px;">Happiness</p>
            <p style="font-size: 50px;font-weight:bold;margin-left: 30px;">Starts Here</p>
            <img src="{{URL('images/icon image.png')}}" height="470px" style="margin-left: 100px;"/>
        </div>
<!---------right------------------->

<div class="login_col2">

        @if($errors->any())
            <div class="mb-4 text-red-600">{{ $errors->first() }} </div>
        @endif
        <form method="POST" action="{{ url('/login') }}">
            @csrf
<img src="{{URL('images/pawpad.png')}}"
                    style="height:130px;width:130px; margin: 60px 40%;">
                <h5 style="text-align: center; font-size: 20px; margin-top: -100px;">Create an Account</h5>
                <button style="border-radius:10px;margin-left: 40%;height: 30px;"> 
                    <img src="https://clipartcraft.com/images/google-logo-png.png" style="height: 15px; width:20px;">
                  <a href="{{url('auth/google')}}" style="color: black;">  Sign in with google</a>
                </button>
                <p style="text-align: center;">-OR-</p>

            <!-- Email Address -->
        <div class="inputbox">
                <label  >Email</label><br>
                <input type="email" name="email"class="block mt-1 w-full" />
            </div>

            <!-- Password -->
        <div class="inputbox">
                <label>Password</label> <br>
                <input type="password" name="password" class="block mt-1 w-full"/>
            </div>

            <div>
                <div class="block mt-4">
                <button type="submit" class="btn">Login</button> &nbsp;&nbsp;
                 
            {{-- <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"  name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label> --}}
             <a href="/register" class="text-sm text-blue-600">Create Account</a>
        </div> 
            </div>
        </form>
    </div>
</div>
</body>
</html>