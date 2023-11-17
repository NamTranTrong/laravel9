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

    public function AddtoCart($id){
        // session()->flush();  //xóa dữ liệu session 
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else{
            $cart[$id] = [
                'name' => $product->name,
                'price' =>  $product->price,
                'quantity'=> 1,
                'image_path' => $product->feature_image_path,
            ];
        }
        session()->put('cart',$cart);
        // Tính tổng quantity
        $total_quantity = 0;
        foreach ($cart as $item) {
            $total_quantity += $item['quantity'];
        }

        // $html_total_quantity = "<span id='headerElement' class='badge'>".$total_quantity."</span>";
        return response()->json([
            'message' => 'success',
            'total_quantity' => $total_quantity,
            "code" => "200",
        ],200);
    }
}
