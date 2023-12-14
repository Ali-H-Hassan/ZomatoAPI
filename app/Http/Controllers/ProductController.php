<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();
        return response()->json([
            "status" => "success",
            "message" => "Success product created"
        ]);
    }
    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->update([
            "name" => $request->name,
            "price" => $product->price ?: $request->price

        ]);
        return response()->json([
            "status" => "success",
            "message" => "Success product updated"
        ]);
    }
    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);

        if ($product) {
            $product->delete();

            return response()->json([
                "status" => "success",
                "message" => "Product deleted successfully"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Product not found"
            ], 404);
        }
    }

    public function getAll(Product $product)
    {
        $products = Product::orderBy("id", "desc")->get();
        return response()->json([
            "status" => "success",
            "message" => "Success, products are listed",
            "data" => $products
        ]);
    }

}
