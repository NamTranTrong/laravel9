<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;


class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function index()
    {
        $totalPriceAll = 0;
        $cart = Session::get('cart', []);
        if ($cart != []) {
            foreach ($cart as $item) {
                $totalPriceAll += $item['quantity'] * $item['price'];
            }
            return view('order.index', compact('cart', 'totalPriceAll'));
        }
    }

    public function create(Request $request)
    {
        $cart = Session::get('cart', []);
        $totalPriceAll = 0;
        foreach ($cart as $productId => $cartItem) {
            $totalPriceAll += $cartItem['quantity'] * $cartItem['price'];
        }
        $order = $this->order->create([
            'order_code' => 'ORD-' . strtoupper(uniqid()),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'discount_code' => $request->discount_code,
            'email' => $request->email,
            'city_address' => $request->city_address,
            'phone' => $request->phone,
            'user_id' => auth()->id(),
            'note' => $request->note,
            'total_price' => number_format($totalPriceAll, 0, '.', ','),
        ]);
        foreach ($cart as $productId => $cartItem) {
            $order->products()->attach($productId, ['quantity' => $cartItem['quantity']]);
        }
        //Sau khi in hóa đơn thanh toán sẽ cập nhật lại giỏ hàng 
        Session::forget('cart');  // Chỉ xóa giỏ hàng, không xóa session người dùng
        return redirect()->route('home.index');
    }
}
