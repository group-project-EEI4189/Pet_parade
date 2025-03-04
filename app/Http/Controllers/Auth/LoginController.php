<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Redirect based on user role (admin or regular user)
            if ($user->is_admin) {
                // Redirect admin to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Redirect regular user to the user dashboard
                return redirect()->route('customer.dashboard');
            }
        }

        // If login fails, return an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
