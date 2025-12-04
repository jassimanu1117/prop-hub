<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {

        //Check if checkout redirect session exists
        if ($request->session()->has('checkout_redirect')) {
            $request->session()->forget('checkout_redirect'); // clear it once used
            return redirect()->route('checkout')
                ->with('success', 'You are logged in. Proceed with your checkout.');
        }
        //Default redirect
         return redirect()->route('user.dashboard');
        }
        return back()->withErrors(['Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('user.login')
            ->with('status', 'Logged out successfully.');
    }

}
