<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'review' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'product_id' => 'required|exists:products,id'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $review = Review::create($request->all());

    // Recalculate average rating and total reviews for this product
    $avgRating = Review::where('product_id', $request->product_id)->avg('rating');
    $totalReviews = Review::where('product_id', $request->product_id)->count();

    return response()->json([
        'success' => true,
        'review' => $review,
        'avgRating' => $avgRating,
        'totalReviews' => $totalReviews, // make sure this key exists
    ]);

}

}
