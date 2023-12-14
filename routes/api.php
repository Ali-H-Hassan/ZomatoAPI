<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(ProductController::class)->group(function () {
    Route::post('createProduct', 'createProduct');
    Route::post('updateProduct', 'updateProduct');
    Route::get('getAll', 'getAll');
    Route::post('deleteProduct', 'deleteProduct');
});

Route::controller(RestaurantController::class)->group(function () {
    Route::post('createRestaurant', 'createRestaurant');
    Route::post('updateRestaurant', 'updateRestaurant');
    Route::get('getAllR', 'getAllR');
    Route::post('deleteRestaurant', 'deleteRestaurant');
    Route::get('searchRestaurants', 'searchRestaurants');
});

Route::controller(ReviewController::class)->group(function () {
    Route::post('createReview', 'createReview');
    Route::get('getRestaurantReviews/{restaurantId}', 'getRestaurantReviews');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('getAllCategories', 'getAllCategories');
    Route::post('createCategory', 'createCategory');
    Route::put('updateCategory/{id}', 'updateCategory');
    Route::delete('deleteCategory/{id}', 'deleteCategory');
    Route::get('getRestaurantsByCategory/{categoryId}', 'getRestaurantsByCategory');
});
