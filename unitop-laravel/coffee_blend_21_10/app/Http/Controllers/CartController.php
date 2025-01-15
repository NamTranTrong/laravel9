<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product = $product;
    }
    public function addToCart($id)
    {
        if(!auth()->check()){
            return response()->json(['status' => 401, 'message' => 'Vui lòng đăng nhập để mua hàng !']);
        }
        else{
            $product = $this->product->find($id);
    
            if (!$product) {
                return response()->json(['status' => 404, 'message' => 'Product not found']);
            }
        
            // Lấy giỏ hàng từ session hoặc khởi tạo giỏ hàng mới nếu không có
            $cart = session()->get('cart', []);
        
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                // Nếu chưa có, thêm mới sản phẩm vào giỏ hàng
                $cart[$id] = [
                    'id' => $id,
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->feature_image_path,
                ];
            }
        
            // Lưu giỏ hàng vào session
            session()->put('cart', $cart);
        
            // Tính tổng số lượng sản phẩm và tổng tiền
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['quantity'] * $item['price'];
            }
        
            // Trả về dữ liệu giỏ hàng cho AJAX
            return response()->json([
                'status' => 200,
                'totalProduct' => $totalQuantity,
                'totalPrice' => $totalPrice,
                'cart' => $cart,  // Trả về toàn bộ giỏ hàng trong session
            ], 200);
        }

    }

    public function removeIconBagCart($id){
        $cart = Session::get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            Session::put('cart', $cart); // Cập nhật lại session
        }
        $product = $this->product->find($id);

        return response()->json([
            'status' => 200,
            'cart' => $cart // Trả về danh sách sản phẩm còn lại
        ]);
    }

    public function showShoppingCart(){
        $cart = Session::get('cart',[]);
        return view('shopping-cart.index');
    }

    public function updateIconShoppingCart(Request $request,$id){
        $newQuantity = $request->input('quantity');
        $cart = Session::get('cart', []);
        $totalPriceAll = 0;

        if(isset($cart[$id])) {
            // Cập nhật số lượng của sản phẩm trong giỏ hàng
            $cart[$id]['quantity'] = $newQuantity;
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found in the cart.'
            ], 404);
        }
        foreach ($cart as $item) {
            $totalPriceAll += $item['quantity'] * $item['price'];
        }
        Session::put('cart', $cart);

        return response()->json([
            'status' => 200,
            'product' => $cart[$id],
            'totalPrice' => number_format($cart[$id]['quantity'] * $cart[$id]['price'], 0, ',', '.') . '₫',
            'totalPriceAll' => number_format($totalPriceAll),
        ],200);
    }
    public function removeIconShoppingCart(Request $request,$id){
        $productId = $request->input('productId');
        $cart = Session::get('cart',[]);
        $totalPriceAll = 0;

        if(isset($cart[$productId])){
            unset($cart[$productId]);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found in the cart.'
            ], 404);
        }
        foreach ($cart as $item) {
            $totalPriceAll += $item['quantity'] * $item['price'];
        }
        Session::put('cart', $cart);

        return response()->json([
            'status' => 200,
            'totalPriceAll' => number_format($totalPriceAll,0,',','.').'đ',
        ]);

    }
    
}
