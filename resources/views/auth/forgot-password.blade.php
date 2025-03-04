<style>
 .login_col2 {
        flex-basis: 50%;
        border-radius: 10px;
        background-color: white;
    }
    .register {
        margin: 10px 0 15px;
        font-size: 14.6px;
        text-align: center;
    }
    .btn {
        width: 50%;
        height: 40px;
        background-color: hotpink;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        color: white;
        border-radius: 40px; 
        margin-top: 10px;
        transition: all 0.2s;
        transform: translateY(-5px);
        margin-right: 260px;
        margin-bottom: 20px; 
        padding-right: 40px;
    }
    .btn:hover {
        background: white;
        color: black;
    }

    .btn:active {
        transform: translateY(0px);
    }
    .form_format{ 
        margin-top: 10%;
        margin-bottom: 10%;
        margin-left: 20%;
        margin-right: 20%;
    }
    
    .form input {
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
    .form{
        margin-left: 150px;
        margin-bottom: 20px; 
        padding-right: 40px;
    }
</style>
<body style="background-color:#FFDDD2;">
 
<div class="form_format"> 
    <div class="login_col2">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset 
            link that will allow you to choose a new one.') }}
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" /><br>

    <form method="POST" action="{{ route('password.email') }}" class="form"> <br>
        @csrf
        <!-- Email Address -->
        <div class="email">
            <x-input-label for="email" :value="__('Email')" /><br>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="register">
        <x-primary-button class="btn">  {{ __('Email Password Reset Link') }}</x-primary-button>
        </div>
    </form> 
    </div>
</div>
</body>