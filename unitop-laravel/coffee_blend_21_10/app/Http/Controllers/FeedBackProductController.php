<?php

namespace App\Http\Controllers;

use App\Models\ProductFeedBack;
use Illuminate\Http\Request;


class FeedBackProductController extends Controller
{
    protected $productFeedBack;
    public function __construct(ProductFeedBack $productFeedBack){
        $this->productFeedBack = $productFeedBack;
    }

    public function postFeedBack(Request $request,$productId){
        if(!auth()->check()){
            return redirect()->route('login.index')->with('error', 'Bạn cần đăng nhập trước!');
        }
        else{
            $this->productFeedBack->create([
                'product_id' => $productId,
                'user_id' => auth()->id(),
                'rating'=> $request->rating,
                'comment' => $request->comment,
            ]);
            return redirect()->back();
        }

    }
}
