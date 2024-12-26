<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CollectionController extends Controller
{
    public function collection(){
        $categories = Category::where('parent_id',0)->get();   
        $lv2Categories = [];
        $products = Product::all();
        foreach($categories as $category){
            if($category->categoryChild()->count()){
                $lv2Categories = $category->categoryChild()->get();
            }
        }
        return view('product.collection',compact('lv2Categories','categories','products'));
    }

    public function getProductsByCategory($categoryId){
        $products = Product::where('category_id', $categoryId)->get();

        // Trả về danh sách sản phẩm dưới dạng JSON
        return response()->json($products);
    }
}
