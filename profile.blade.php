 <style>
         .head {
            width: 90%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            align-items: center;
        }
        header {
            padding: 10px 0;
        }

        .logo-brand {
            display: flex;
            align-items: center;
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
            margin: 10px 400px 10px 200px;
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
        .account{
            padding-left: 350px;
        }
        .inputbox {
            padding-left: 20%;
            margin-top: 10px;
        }
        .inputbox p {
            width: 60%;  
            outline: none;  
            padding: 10px; 
        }
        .user-details{
            align-items: center;
        }
        .heading{
            padding-left: 50%;
            font-size: 20px;
        }
        .btn {
        width: 15%;
        height: 40px;
        background-color: #F2968F;
        cursor: pointer;
        font-size: 18px;
        font-weight: 600;
        color: white;
        border-radius: 40px;
        margin-left: 10%;
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
    .profile-picture{ 
        margin-left: 50%;
        height: 120px;
        width: 120px; 
    }
    .footer {
            background-color: #ffede2;
            text-align: left;
            z-index: 2;
            margin-top: 30px; 
        }

</style>

<body>
    <header class="home-header">
        <div class="head">
            <div class="logo-brand">
                <div class="logo"><img src="{{URL('images/HomepageImages/Logo.png')}}"></div>
                <div class="brand">Pet Parade</div>
            </div>
            <nav>
                <div class="main-nav">
                    <ul>
                        <li><a href="home.html">Show Case</a></li>
                        <li><a href="#">Best Selling</a></li> 
                     </ul>
                </div >
                <div class="-mx-3 flex flex-1 justify-end" style= "font-size:large; color:rgb(248, 142, 21);">
                <a href="{{ url('/dashboard') }}"> Account </a>
                </div>
             </nav>
</div> 
<br><br>
<div class="user-details" >
<h1 class="heading" >User Information</h1>
<div class="profile-picture"><img src="{{URL('images/cute-dog.jpg')}}"></div>

<!---------user details ------------------->
            <div class="inputbox"> 
            <p><strong>Full Name:</strong> 
            <p style="background-color: #D9D9D9; ">{{ Auth::user()->name }}
            </p>    
            </p>
            </div>
            
            <div class="inputbox"> 
            <p><strong>Email Address:</strong> 
            <p style="background-color: #D9D9D9; ">{{ Auth::user()->email }}
            </p>
            </p> 
            </div>

            <div class="inputbox"> 
            <p><strong><a href="{{ route('profile.edit') }}">Edit Profile</a> </strong></p>
            </div>

            <div class="inputbox"> 
            <x-primary-button class="btn" href="{{ url('welcome') }}"> {{ __('Sign Out') }} </x-primary-button>
            </div>
            
            @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="img-thumbnail" width="150">
            @else
                <p>No profile picture uploaded.</p>
            @endif    
        </div>  
            </div> 
<a href="#" style="padding-left:80% ; color: #522c16;">Terms & Conditions</a>

<div class="footer">
<div class="logo-brand">
                <div class="logo"><img src="{{URL('images/HomepageImages/Logo.png')}}"></div>
                <div class="brand">Pet Parade</div><br> 
            </div>
            <p style="float: right;color: #522c16;Font-size:20px;">Contact Us</p>
            <br>
            <p style="font-size:20px;text-decoration:bold">Swipe.Shop.Snugge</p> 
        <div> 
            <a href="#" style="padding-left: 40%; color:rgb(63, 59, 57);">Privacy Policy</a><br><br>
        </div>
    </div>
</body> 