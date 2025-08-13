<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class imageSlideController extends Controller
{
    public function allSlides(){
        $slides = Slider::all();
        return $slides;
    }
}
