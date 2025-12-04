<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class AdminOrderItemsController extends Controller
{
    public function orderItems($orderId){

    // Fetch Order + Items
        $order = Order::with('items.product')->find($orderId);

        if(!$order){
            return redirect()->route('admin.orders.index')
                             ->with('error', 'Order not found!');
        }

     return view('dashboard.admin.orders.items', compact('order'));    

    }
}
