<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Menu;

class CategoryController extends FrontendController
{
    public function __construct(){
        parent::__construct();
    }

    public function getListProduct(Request $request){
        $url = $request->segment(2);
        $url=preg_split('/(-)/i',$url);
        
        if($id = array_pop($url)){
            $products = Product::where([
                'pro_category_id' => $id,
                'pro_active' => Product::STATUS_PUBLIC,
            ])->limit(10)->orderBy('id','DESC')->paginate(10);

            $cateProduct = Category::find($id);
        }

        $menu_s= Menu::all();
        // dd($menu_s);

        $categories = Category::where([
            'c_active'  => Category::PUBLIC_STATUS,
        ])->paginate(20);



        $viewData = [
            'products' => $products,
            'menu_s' => $menu_s,
            'categories' => $categories,
            'cateProduct' => $cateProduct,
        ];
        return view('product.index', $viewData);
    }
}
