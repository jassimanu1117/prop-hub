<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
    // Check admin guard
    if (Auth::guard('admin')->check()) {
        $admin = Auth::guard('admin')->user();

        if ($admin->role_id == 1 && in_array('Super Admin', $roles)) {
            return $next($request);
        }

        if ($admin->role_id == 2 && in_array('Admin', $roles)) {
            return $next($request);
        }
    }

    // Check user guard (web)
    if (Auth::guard('web')->check()) {
        $user = Auth::guard('web')->user();

        if ($user->role_id == 3 && in_array('User', $roles)) {
            return $next($request);
        }
    }

    abort(403, 'Unauthorized Access');
}

}
