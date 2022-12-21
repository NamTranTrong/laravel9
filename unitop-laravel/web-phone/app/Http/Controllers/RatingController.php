<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Support\Carbon;

class RatingController extends Controller
{
    public function saveRating(Request $request,$id){
        if($request->ajax()){
            Rating::insert([
                'ra_product_id' => $id,
                'ra_number' => $request->number,
                'ra_user_id' => get_data_user('web'),
                'ra_content' => $request->content,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $product=Product::find($id);

            $product->pro_total_number+=$request->number;
            $product->pro_total_rating+=1;
            $product->save();

            return response()->json(['code'=>'1']);
        }
    }
}
