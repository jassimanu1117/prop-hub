<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrdersController extends Controller
{
    public function index(){

     $orders = Order::latest()->get();   

     return view('dashboard.admin.orders.index', compact('orders'));
     
    }

   public function destroy($id)
     {
    $order = Order::find($id);

    if (!$order) {
        return redirect()->back()->with('error', 'Order not found.');
    }

    // Delete related items
    $order->items()->delete();

    // Delete main order
    $order->delete();

    return redirect()->back()->with('success', 'Order deleted successfully.');
    }

}
