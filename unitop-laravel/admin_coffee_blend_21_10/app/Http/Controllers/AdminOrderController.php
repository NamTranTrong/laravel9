<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    protected $order;
    public function __construct(Order $order){
        $this->order = $order;
    }

    public function index(){
        $orders = $this->order->latest()->paginate(10);
        return view('admin.order.index',compact('orders'));
    }

    public function changeStatus(Request $request){
        $orderId = $request->input('order_id');
        $newStatus = $request->input('status');
        $order = $this->order->find($orderId);
        $order->update([
            'status' => $newStatus,
        ]);

        return response()->json([
            'status' => 200,
        ],200);
    }
}
