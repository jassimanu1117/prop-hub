<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class UserWishlistController extends Controller
{
    // Show wishlist page (after login)
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('dashboard.user.wishlists', compact('wishlists'));
    }

    // Merge guest localStorage wishlist into DB
    public function merge(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }

       $items = $request->wishlist ?? [];

        collect($items)->each(function ($item) use ($user) {
        Wishlist::updateOrCreate(
            [
                'user_id'    => $user->id,
                'product_id' => $item['id'],
            ],
            [
                'name'  => $item['name'],
                'price' => $item['price'],
                'image' => $item['image'],
            ]
        );
    });

    /**
     * Lets explain updateOrCreate function.
     * First array tells laravel how to find and existing record 
     * Second array tells laravel what to epdate if it exists
     * Or what to insert if it doesn't
     * 1.Laravel checks the database for a record where
     *     user_id = $user->id
     *     AND product_id = $item['id']
     * 2.If a record existsLaravel updates the name, price, image  
     * columns with the new values.
     *.3.If no record existsLaravel inserts a new row with
     * all these values.
     */      

    return response()->json(['success' => true]);
   }



}