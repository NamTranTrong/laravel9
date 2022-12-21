<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $transactions=Transaction::with('user:id,name')->paginate(10);

        $viewData = [
            'transactions' => $transactions,
        ];

        return view('admin::transaction.index',$viewData);
    }

 /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function viewOrder($id){
            $orders= Order::with('product')->where('or_transaction_id',$id)->get();

            $html= view('admin::components.order',compact('orders'))->render();
            $html=str_replace("\r\n", '', $html);
            
            return response()->json($html);
    }


}


