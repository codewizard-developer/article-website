<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the 'admin' session exists
        if (!Session::has('admin')) {
            // If not, return an unauthorized response
            return redirect('/admin-login')->with('error', 'Please login to access the admin area');
        }

        // Proceed with the request if the admin is authenticated
        return $next($request);
    }
}

