<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::all();

        return response()->json([
            "status" => "success",
            "message" => "All categories retrieved successfully",
            "data" => $categories,
        ]);
    }

    public function createCategory(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            "status" => "success",
            "message" => "Category created successfully",
            "data" => $category,
        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->update([
                'name' => $request->name,
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Category updated successfully",
                "data" => $category,
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Category not found",
            ], 404);
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();

            return response()->json([
                "status" => "success",
                "message" => "Category deleted successfully",
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Category not found",
            ], 404);
        }
    }

    public function getRestaurantsByCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if ($category) {
            $restaurants = $category->restaurants;

            return response()->json([
                "status" => "success",
                "message" => "Restaurants retrieved successfully",
                "data" => $restaurants,
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Category not found",
            ], 404);
        }
    }
}
