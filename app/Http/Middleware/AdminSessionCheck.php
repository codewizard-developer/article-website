<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminSessionCheck
{
    public function handle(Request $request, Closure $next)
    {
        $fromSession = session('admin_logged_in');
        $fromCache = Cache::get('admin_session_' . $request->ip());

        if ($fromSession || $fromCache) {
            return $next($request);
        }

        return redirect()->route('dashboard.login')->withErrors(['Access denied. Please login as admin.']);
    }
}

