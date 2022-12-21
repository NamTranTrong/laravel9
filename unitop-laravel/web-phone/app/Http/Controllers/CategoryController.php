<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class CategoryController extends FrontendController
{

    public function __construct(){
        parent::__construct();
    }
    
    public function getListProduct (Request $request){
        $url=$request->segment(2); // LẤY PHẦN TỬ THỨ 2 CỦA LINK 
        $url=preg_split('/(-)/i',$url); //TÁCH CÁC CHỮ KHI GẶP DẤU (-) THÀNH 1 MẢNG
       // dd(array_pop($url));// LẤY PHẦN TỬ CUỐI CỦA MẢNG

        if($id=array_pop($url)){
            $products=Product::where([
                'pro_category_id'=>$id,
                'pro_active' => Product::STATUS_PUBLIC
            ])->orderBy('id','DESC')->paginate(10);       
        }

        $cateProduct=Category::find($id);

        $viewData=[
            'products' =>$products,
            'cateProduct'=>$cateProduct
        ];

        return view('product.index',$viewData);
    }
}
