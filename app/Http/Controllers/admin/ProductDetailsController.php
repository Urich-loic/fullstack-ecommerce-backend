<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetails;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function getProduct(Request $request, $id)
    {
        $productDetail = ProductDetails::where('product_id', $request->id)->first();
        $product = ProductList::findOrFail($id);

        $item = [$product, $productDetail];

        // array_push($item,[$product, $productDetail]);
        return $item;
    }


    public function similarProduct(Request $request){
        $category = $request->category;
        $similarProducts = ProductList::where('category', $category)->limit(6)->get();

        return $similarProducts;
    }


}
