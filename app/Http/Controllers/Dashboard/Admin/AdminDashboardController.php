<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    /**
     * Show the Admin Dashboard.
     */
    public function showAdminDashboard()
    {
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        $recentOrders = Order::latest()->get();

        return view('dashboard.admin.dashboard', compact(
            'totalCategories',
            'totalBrands',
            'totalProducts',
            'totalOrders',
            'recentOrders'
        ));
    }
}
