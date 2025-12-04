<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            // Both Super Admin (1) and Admin (2) use the same dashboard
               return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['Invalid credentials']);
    }

   public function logout()
   {
    Auth::guard('admin')->logout();

    return redirect()->route('admin.login')
        ->with('status', 'Logged out successfully.');
    }


}
