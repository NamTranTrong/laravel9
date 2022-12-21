<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;
// use App\Http\Controllers;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Carbon;



class ShoppingCartController extends FrontendController
{
    public function __construct(){
        parent::__construct();
    }

    public function addProduct(Request $request,$id){{
        
        $product=Product::find($id);

        if(!$product){
            return redirect('home'); 
        }

        $price=$product->pro_price;
        if($product->pro_sale){{
            $price=$price*(100-$product->pro_sale)/100;
        }}

        CartFacade::add([
            'id' => $id,
            'name' => $product->pro_name,
            'price' => $price,
            'quantity' => 1,
            "attributes" => [
                "avatar" => $product->pro_avatar,
                "sale"=> $product->pro_sale,
                "price_old" => $product->pro_price,
            ],
        ]);
        //session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->back();
    }}

    public function deleteProduct($key) {
        CartFacade::remove($key);

        return redirect()->back();
    }

    public function getListShoppingCart(){
        $products=CartFacade::getContent();
        return view('shopping.index',compact('products'));
    }

    public function getFormPay(){
        $products=CartFacade::getContent();
        return view('shopping.pay',compact('products'));
    }

    public function saveInfoShoppingCart(Request $request){
        $totalMoney=CartFacade::getTotal();
        $transactionId=Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total'=>$totalMoney,
            'tr_note' =>$request->note,
            'tr_address' =>$request->address,
            'tr_phone' =>$request->phone,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        if($transactionId){
            $products=CartFacade::getContent();
            foreach($products as $product){
                Order::insert([
                    'or_transaction_id' =>  $transactionId,
                    'or_product_id'     =>  $product->id,
                    'or_qty'            =>  $product->quantity,
                    'or_price'          =>  $product->attributes->price_old,
                    'or_sale'           =>  $product->attributes->sale,
                ]);
            }
        }
    }
}
