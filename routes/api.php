<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\contactController;
use App\Http\Controllers\admin\imageSlideController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\ProductCartController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\ProductDetailsController;
use App\Http\Controllers\admin\ProductReviewController;
use App\Http\Controllers\admin\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/get-visitor', [VisitorController::class, 'getVisitorDetails']);
// contact
Route::post('/contact', [contactController::class, 'storeContact']);
// Category controller
Route::get('/categories', [CategoryController::class, 'allCategories']);
// Product controller
Route::get('/products/{remark}', [productController::class, 'allProducts']);
Route::get('/products-by-categories/{category}', [productController::class, 'allProductsByCategory']);
Route::get('/products-by-sub-cat/{category}/{sub_cat}', [productController::class, 'allProductsBysubCategory']);
Route::get('/product/{id}', [ProductDetailsController::class, 'getProduct']);
Route::get('/search/{key}', [productController::class, 'searchedProduct']);

// Home page slider controller
Route::get('/get-slider', [imageSlideController::class, 'allSlides']);

//Notification controller
Route::get('/notification', [NotificationController::class, 'allNotification']);
Route::get('/similar/{category}', [ProductDetailsController::class, 'similarProduct']);
Route::get('/reviews/{product_id}', [ProductReviewController::class, 'getReviews']);
Route::post('/addToCart/{product_code}', [ProductCartController::class, 'addToCart']);
Route::get('/productCount', [ProductCartController::class, 'productCount']);
