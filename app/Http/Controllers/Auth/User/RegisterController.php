<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show registration form
     */
    public function showRegistrationForm()
    {
        return view('auth.user.register'); 
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        // 1. Validate request
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8|confirmed', 
        ]);

        // 2. Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. If user came from checkout → auto login & redirect
        if ($request->session()->has('checkout_redirect')) {
            Auth::login($user); // auto login ONLY for checkout flow
            $request->session()->forget('checkout_redirect');

            return redirect()->route('checkout')
                ->with('success', 'Account created successfully. Proceed with your checkout.');
        }

        // 4. Otherwise → do NOT auto login, stay on register page with success message
        return back()->with('success', 'Account created successfully. Please log in to continue.');
    }
}
