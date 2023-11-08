<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($slug,$category_id){
        $categories = Category::where('parent_id',0)->get();
        $GetCategoryLimit = Category::where('parent_id',0)->take(5)->get();
        $products = Product::where('category_id',$category_id)->paginate(5);
        return view('product.category.list',compact('categories','GetCategoryLimit','products'));
    }
}
