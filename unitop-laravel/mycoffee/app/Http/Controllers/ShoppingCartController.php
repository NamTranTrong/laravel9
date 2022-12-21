<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Darryldecode\Cart\Facades\CartFacade;
use App\Models\Product;

class ShoppingCartController extends HomeController
{
    //
    public function __construct(){
        parent::__construct();
    }

    public function addProduct(Request $request,$id){
        $product = Product::find($id);

        if(!$product){
            return redirect('home');
        }

        CartFacade::add([
            'id' => $id,
            'name' => $product->pro_name,
            'price' =>  $product->pro_price,
            'quantity'  => 1,
            "attribute" => [
                "avatar"=>$product->avatar,
                "sale" =>$product->pro_sale,
            ],
        ]);
        return redirect()->back();
    }
}
