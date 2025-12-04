<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    // Show dashboard cart page
    public function index()
    {
       $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('dashboard.user.cart', compact('cartItems'));

     } 
    // Merge localStorage cart into DB (called by JS)
    public function merge(Request $request)
    {
    $user = $request->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

      $items = $request->input('cart', []);

      DB::transaction(function () use ($items, $user) {
        foreach ($items as $item) {
            $productId = $item['id'];
            $qty = isset($item['qty']) ? (int)$item['qty'] : 1;
            $price = $item['price'] ?? 0;

            Cart::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $productId,
                ],
                [
                    'quantity' => DB::raw("quantity + $qty"),
                    'price' => $price
                ]
            );
        }
    });

    return response()->json(['success' => true]);
   }

    // Delete a cart item
    public function destroy($id)
    {
        $user = auth()->user();
        $item = Cart::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $item->delete();
        return back()->with('success', 'Item removed.');
    }

    // Update quantity (AJAX)
    public function update(Request $request, $id)
    {
        $user = $request->user();
        $qty = (int) $request->input('quantity', 1);
        $item = Cart::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $item->quantity = max(1, $qty);
        $item->save();
        return response()->json(['success' => true]);
    }

}
