<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProviderMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to the login page if the user is not authenticated
            return redirect()->route('login')->with('error', 'You need to login first.');
        }
    
        if (Auth::user()->role !== 'Service-provider') {
            return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
        }
    
        return $next($request);
    }
}
