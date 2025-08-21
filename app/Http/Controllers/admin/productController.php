<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function allProducts(Request $request, $remark)
    {
        $product_list = ProductList::where('remark', $remark)->get();

        if ($product_list->isEmpty()) {
            return response()->json([
                'message' => 'No products found for this remark.'
            ], 404);
        }

        return response()->json($product_list);
    }

    public function allProductsByCategory(Request $request, $category)
    {
        $product_list = ProductList::where('category', $request->category)->get();

        if ($product_list->isEmpty()) {
            return response()->json([
                'message' => 'No products found for this remark.'
            ], 404);
        }

        return $product_list;
    }

    public function allProductsBySubCategory(Request $request)
    {
        $product_list = ProductList::where('category', $request->category)->where('sub_cat', $request->sub_cat)->get();



        if ($product_list->isEmpty()) {
            return response()->json([
                'message' => 'No products found for this remark.'
            ], 404);
        }

        return $product_list;
    }


    public function searchedProduct(Request $request, $key)
    {
        $key = $request->key;
        $product_list = ProductList::where('title', 'LIKE', '%' . $key . '%')
            ->orWhere('brand', 'LIKE', '%' . $key . '%')
            ->get();

        if (!$product_list) {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }

        return $product_list;
    }
}
