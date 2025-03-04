<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; 
use Symfony\Component\HttpFoundation\Response; 
namespace App\Http\Middleware; 
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Request;
use Pest\Support\Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     * @return mixed
     * @param  \Closure $next
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // If the user is not an admin, redirect them to the home page or another page
        return redirect('/welcome');
    }
}
