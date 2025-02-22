<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        // Get the authenticated user
        $user = Auth::user(); // or auth()->user()

        // Check if the user's role matches the required role
        if ($user->role !== $role) {
            abort(403, 'Unauthorized access'); // Show a 403 error if role does not match
        }

        return $next($request);
    }

    
}

