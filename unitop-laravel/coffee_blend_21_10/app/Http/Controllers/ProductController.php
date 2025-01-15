<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductFeedBack;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    protected $productFeedBack;
    public function __construct(Product $product,Category $category,ProductFeedBack $productFeedBack){
        $this->product = $product;
        $this->category = $category;
        $this->productFeedBack = $productFeedBack;
    }

    public function getProduct($productId){
        $averageRating = (float)$this->productFeedBack->where('product_id',$productId )->avg('rating');
        $totalFeedBack = $this->productFeedBack->count();
        $product = $this->product->find($productId);
        $relatedProducts = $this->product->where('category_id',$product->category_id)->inRandomOrder()->get();
        $productFeedBacks = $this->productFeedBack->all();

        return view('product.product-detail',compact('product','relatedProducts','productFeedBacks','totalFeedBack','averageRating'));
    }

    public function addToCartInProductDetail(Request $request,$productId){
        if(!auth()->check()){
            return response()->json([
                'status' => 401,
                'message' => 'Vui lòng đăng nhập thêm vào giỏ hàng !'
            ]);
        }
      
        $newQuantity = $request->input('newQuantity');
        $cart = Session::get('cart',[]);
        $product = $this->product->find($productId);
        $productTotal = 0;
        $totalPriceAll = 0;
        $totalProduct = 0 ;
        if(isset($cart[$productId])){
            $productTotal = $cart[$productId]['quantity'] + $newQuantity;
            $cart[$productId]['quantity'] = $productTotal;
        }else{
            $cart[$productId] = [
                "id" => $productId,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $newQuantity,
                "image" => $product->feature_image_path,
            ];
        }
        Session::put('cart',$cart);

        foreach ($cart as $item) {
            $totalPriceAll += $item['quantity'] * $item['price'];
        }

        $totalProduct = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'status' => 200,
            'totalPrice' => $totalPriceAll,
            'cart' => $cart,
            'product' => $cart[$productId],
            'totalProduct' => $totalProduct,
        ],200);
    }
    
}
