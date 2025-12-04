<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){

        $categories = Category::all(); // fetch all categories
        // eager load category + first image

        $products = Product::with(['category', 'images'])
        ->withCount('reviews')               // total reviews
        ->withAvg('reviews', 'rating')       // average rating
        ->get();

        return view('home', compact('products', 'categories'));
    }

     public function categoryProducts($slug)
     {
     // Fetch category by slug along with products and their images
     $category = Category::with('products.images')
        ->where('slug', $slug)
        ->firstOrFail();

     return view('category-products', compact('category'));
    }

     public function shopMen()
    {
        
    }

    public function shopWomen()
    {
        
    }
}
