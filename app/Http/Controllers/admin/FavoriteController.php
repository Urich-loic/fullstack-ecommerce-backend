<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\favorites;
use App\Models\ProductDetails;
use App\Models\ProductList;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //

    public function addToFavorite(Request $request, $product_code)
    {


        $product_name = $request->input('product_name');
        $image = $request->input('image');

        $product = ProductList::where('product_code', $product_code)->first();
        $productDetails = ProductDetails::where('product_id', $product->id)->first();

        $result = favorites::insert([
            'product_code' => $product_code,
            'product_name' => $product->title,
            'image' => $product->image,
            'email' => 'test@gmail.com',
            'created_at' => now(),
        ]);

        return $result;
    }

    public function FavoriteCount()
    {

        $result = favorites::all();

        return count($result);
    }
}
