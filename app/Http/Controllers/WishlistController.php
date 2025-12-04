<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
     /**
     * Show wishlists.
     */
    public function index()
    {
        return view('wishlists');
    }
}
