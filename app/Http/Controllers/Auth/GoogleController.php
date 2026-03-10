<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleGoogleCallback()
    // {
    //     $googleUser = Socialite::driver('google')->user();

    //     $user = User::updateOrCreate(
    //         ['email' => $googleUser->email],
    //         ['name' => $googleUser->name]
    //     );

    //     Auth::login($user);

    //     return redirect('/dashboard');
    // }
}