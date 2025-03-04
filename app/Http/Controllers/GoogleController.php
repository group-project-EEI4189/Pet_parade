<?php

namespace App\Http\Controllers;
use Illuminate\HTTp\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use exception;

class GoogleController extends Controller
{
    public function googlepage(){ 
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback(){
        $user = Socialite::driver('google')->user();
        return redirect()->to('auth/login'); // Redirect to your desired location
    }
}
