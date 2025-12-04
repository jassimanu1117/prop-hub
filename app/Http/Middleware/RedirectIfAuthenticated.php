<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard === 'admin' && Auth::guard('admin')->check()) {
            // Both Super Admin (1) and Admin (2) share same dashboard
            return redirect()->route('admin.dashboard');
        }

        if ($guard === 'web' && Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}
