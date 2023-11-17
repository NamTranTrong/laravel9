<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $productsCart = session()->get('cart');
        return view('home.cart.cart',compact('productsCart')); 
    }

    public function update(Request $request){
        if($request->id && $request->quantity){
            $productsCart = session()->get('cart');
            $productsCart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$productsCart);
            $productsCart = session()->get('cart');
            $cart_component = view('home.cart.component.table-cart',compact('productsCart'))->render();
            return response()->json([
                'cart_component' => $cart_component,
                'code' => "200",
            ],200);
        }
    }

    public function delete($id){
        $productsCart = session()->get("cart");
        unset($productsCart[$id]);
        session()->put('cart',$productsCart);
        $productsCart = session()->get('cart');
        $cart_component = view('home.cart.component.table-cart',compact('productsCart'))->render();
        return response()->json([
            'cart_component' => $cart_component,
            'code' => "200",
        ],200);
    }
}
