<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductDetailController extends Controller
{
    /**
     * Display the specified product details.
     */
    public function show($id)
    {
        // ✅ Load the product with related category, brand and images
        $product = Product::with(['category', 'brand', 'images'])->findOrFail($id);

        return view('dashboard.admin.products.view', compact('product'));
    }
}
