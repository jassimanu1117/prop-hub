<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index(){

        return view('checkout');
    }

     // Guest Checkout
    public function redirectToGuest(Request $request)
    {
        $request->session()->forget('checkout_redirect');
        return redirect()->route('checkout'); 
    }

    // Register Flow
    public function redirectToRegister(Request $request)
    {
        session(['checkout_redirect' => true]);
        return redirect()->route('register'); // default Laravel register page
    }

    // Login Flow
    public function redirectToLogin(Request $request)
    {
        session(['checkout_redirect' => true]);
        return redirect()->route('user.login'); // default Laravel login page
    }

    
}
