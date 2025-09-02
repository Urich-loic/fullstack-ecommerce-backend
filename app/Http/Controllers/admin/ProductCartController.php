<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCart;
use App\Models\ProductDetails;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function addToCart(Request $request, $product_code)
    {
        $product_name = $request->product_name;
        $image = $request->image;
        $email = $request->email;
        $size = $request->size;
        $color = $request->color;
        $quantity = 3;

        $product = ProductList::where('product_code', $product_code)->first();
        $productDetails = ProductDetails::where('product_id', $product->id)->first();
        $total_price = 0;
        $price = $product->price;
        $special_price = $product->special_price;

        if ($special_price !== null) {
            $total_price = $special_price * $quantity;
        } else {
            $total_price = $price * $quantity;
        }


        $result = ProductCart::insert([
            'product_code' => $product_code,
            'product_name' => $product->title,
            'image' => $product->image,
            'email' => 'test@gmail.com',
            'size' => "Size :" . $productDetails->size,
            'color' => "Color :" . $productDetails->color,
            'quantity' => 1,
            'unit_price' => $product->price,
            'total_price' => $total_price,
            'created_at' => now(),
        ]);

        return $result;
    }
}
