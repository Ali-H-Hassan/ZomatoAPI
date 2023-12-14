<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function createRestaurant(Request $request)
    {

        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->stars = $request->stars;

        $restaurant->save();
        return response()->json([
            "status" => "success",
            "message" => "Success restaurant created"
        ]);
    }
    public function updateRestaurant(Request $request)
    {
        $restaurant = Restaurant::find($request->id);

        if ($restaurant) {
            $restaurant->update([
                "name" => $request->name,
                "stars" => $request->stars
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Restaurant updated successfully"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Restaurant not found"
            ], 404);
        }
    }
    public function deleteRestaurant(Request $request)
    {
        $restaurant = Restaurant::find($request->id);

        if ($restaurant) {
            $restaurant->delete();

            return response()->json([
                "status" => "success",
                "message" => "Restaurant removed successfully"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Restaurant not found"
            ], 404);
        }
    }

    public function getAllR(Restaurant $restaurant)
    {
        $restaurant = Restaurant::orderBy("id", "desc")->get();
        return response()->json([
            "status" => "success",
            "message" => "Success, restaurants are listed",
            "data" => $restaurant
        ]);
    }
    public function searchRestaurants(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $restaurants = Restaurant::where('name', 'like', '%' . $keyword . '%')->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Restaurants found successfully',
                'data' => $restaurants
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Please provide a keyword for the search'
            ], 400);
        }
    }

}
