<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\contactController;
use App\Http\Controllers\admin\imageSlideController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\ProductDetailsController;
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

// Home page slider controller
Route::get('/get-slider', [imageSlideController::class, 'allSlides']);

//Notification controller
Route::get('/notification', [NotificationController::class, 'allNotification']);

