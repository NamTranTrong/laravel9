<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slides = Slide::latest()->get();
        $categories = Category::where('parent_id',0)->get();
        $products = Product::take(8)->get();
        $products_recommend = Product::latest('views_count','desc')->take(8)->get();
        return view("home.home",compact("slides","categories","products","products_recommend"));
    }
}
