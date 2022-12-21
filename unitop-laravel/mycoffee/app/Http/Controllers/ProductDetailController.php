<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductDetailController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDetailProduct(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);

        if($id = array_pop($url)){
            $productDetail = Product::with('category:id,c_name')->find($id); 
        }

        $viewData = [
            'productDetail' => $productDetail,
        ];

        return view('product.detailProduct',$viewData);

    }
}
