<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {

        $categories = Category::all();
        $cat_details = array();

        foreach($categories as $value){
            $subCategories = subCategory::where('cat_name',$value['cat_name'] )->get();

            $items = [
                'cat_name'=>$value['cat_name'],
                'cat_image'=>$value['cat_image'],
                'sub_cat_name'=>$subCategories
            ];

            array_push($cat_details,$items);
        }
        return $cat_details;
    }
}
