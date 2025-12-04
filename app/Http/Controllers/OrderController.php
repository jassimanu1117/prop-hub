<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Place Order from Checkout Page
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'cart' => 'required|array|min:1',
        ]);

        // Identify user
        $user_id = Auth::check() ? Auth::id() : null;
        $guest_id = $user_id ? null : Str::uuid();

        // Calculate subtotal & total
        $subtotal = 0;
        foreach ($request->cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        $total = $subtotal; // Add shipping/tax if needed

        // Create Order
        $order = Order::create([
            'user_id' => $user_id,
            'guest_id' => $guest_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'subtotal' => $subtotal,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Create Order Items
        foreach ($request->cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['title'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
                'total' => $item['price'] * $item['qty'],
            ]);
        }

        return response()->json([
        'status' => 'success',
        'message' => 'Order placed successfully!',
        'order_id' => $order->id
    ]);

    }

    public function success($orderId)
    {
    // Get order with items
    $order = Order::with('items')->findOrFail($orderId);

    return view('order-success', compact('order'));
   }



   public function scannerCheckout(Request $request)
   {
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
        'cart' => 'required|array|min:1',
    ]);

    $user_id = Auth::check() ? Auth::id() : null;
    $guest_id = $user_id ? null : Str::uuid();

    // Calculate subtotal
    $subtotal = 0;
    foreach($request->cart as $item){
        $subtotal += $item['price'] * $item['qty'];
    }
    $total = $subtotal; // Add shipping/tax if needed

    // Create Order with pending status
    $order = Order::create([
        'user_id' => $user_id,
        'guest_id' => $guest_id,
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
        'subtotal' => $subtotal,
        'total' => $total,
        'status' => 'pending',
        'transaction_id' => $request->txn_id ?? null,
    ]);

    // Create Order Items
    foreach($request->cart as $item){
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item['id'],
            'product_name' => $item['title'],
            'quantity' => $item['qty'],
            'price' => $item['price'],
            'total' => $item['price'] * $item['qty'],
        ]);
    }

    return response()->json([
        'status' => 'pending',
        'message' => 'Order received and pending verification.',
        'order_id' => $order->id
    ]);
  }


}
