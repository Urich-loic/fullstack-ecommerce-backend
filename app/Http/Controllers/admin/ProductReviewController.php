<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function getReviews(Request $request, $product_id){
        $reviews = ProductReview::where('product_id', $product_id)->get();
        return $reviews;
    }
}
