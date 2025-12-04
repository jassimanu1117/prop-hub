<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ProductDetailsController extends Controller
{
    public function index($slug)
    {
    // Fetch product by slug
    $product = Product::with(['images', 'category', 'brand'])
        ->where('slug', $slug)
        ->firstOrFail();

    // Fetch related products from the same category, excluding current product
    $relatedProducts = Product::with('images')
        ->where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->get();

    // Fetch product reviews
    $reviews = Review::where('product_id', $product->id)
                ->orderBy('created_at', 'desc')
                ->get();

    // Calculate average rating
    $avgRating = $reviews->avg('rating'); // e.g., 4.2
    $totalReviews = $reviews->count();    // e.g., 120

    return view('product-details', compact(
        'product',
        'relatedProducts',
        'reviews',
        'avgRating',
        'totalReviews'
    ));
   }


}
