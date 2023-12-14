<?php

namespace App\Http\Controllers;

use App\Models\Review;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function createReview(Request $request)
    {
        $review = Review::create([
            'restaurant_id' => $request->restaurant_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return response()->json([
            "status" => "success",
            "message" => "Review created successfully",
            "data" => $review,
        ]);
    }

    public function getRestaurantReviews($restaurantId)
    {
        $reviews = Review::where('restaurant_id', $restaurantId)->get();

        return response()->json([
            "status" => "success",
            "message" => "Restaurant reviews retrieved successfully",
            "data" => $reviews,
        ]);
    }
}
