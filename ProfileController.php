<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Show the user profile
        return view('profile.show', [
            'user' => Auth::user()
        ]);
    }

     // Show the profile edit form
     public function edit()
     {
         // Get the authenticated user
         $user = Auth::user();
         return view('profile.edit', compact('user'));
     }

    public function index()
    {
        $user = Auth::user();  // Get the logged-in user data
        return view('profile.index', compact('user'));
    }

     // Update the user profile
     public function update(Request $request)
     {
         // Validate the inputs
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255',
             'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
 
        // Get the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');


        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            
            // Store the new photo and save the path
            $path = $request->file('profile_photo')->store('profile_photos');
            $user->profile_photo = $path;
        }

      //  if ($request->password) {
       //     $user->password = bcrypt($request->password); }

        return redirect()->route('profile.index')->with('status', 'Profile updated successfully!');
    }
}
