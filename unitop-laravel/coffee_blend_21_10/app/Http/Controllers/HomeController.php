<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(){
        // dd(Session::all());  // Kiểm tra tất cả dữ liệu trong session
        $categories = Category::where('parent_id',0)->get();
        $sliders = Slider::latest()->get();
        $products = Product::all(); 
        $bestSellerProducts = [];
        $blogs = Blog::all();
        foreach ($products as $product) {
            if ($product->tags->contains('name', 'bestseller')) {
                $bestSellerProducts[] = $product;
            }
        }
        return view('home.home',compact('sliders','categories','bestSellerProducts','blogs'));
    }
    public function shop(){
        $categories = Category::where('parent_id',0)->get();   
        $lv2Categories = [];
        $products = Product::all();
        foreach($categories as $category){
            if($category->categoryChild()->count()){
                $lv2Categories = $category->categoryChild()->get();
            }
        }
        return view('product.shop',compact('lv2Categories','categories','products'));
    }

}
