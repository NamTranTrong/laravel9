<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id',0)->get();
        $sliders = Slider::latest()->get();
        return view('home.home',compact('sliders','categories'));
    }
    public function shop(){
        return view('product.shop');
    }
}
