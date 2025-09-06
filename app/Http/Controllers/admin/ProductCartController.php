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
        $data = $request->all()[0];
        $size = $data['size'];
        $color = $data['color'];
        $quantity = $data['quantity'];

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
            'size' => "Size :" . $size ?? 'M',
            'color' => "Color :" . $color ?? 'null',
            'quantity' => $quantity ?? 1,
            'unit_price' => $product->price,
            'total_price' => $total_price,
            'created_at' => now(),
        ]);

        return $result;
    }

    public function productCount()
    {
        $products = ProductCart::all();

        return count($products);
    }
}
