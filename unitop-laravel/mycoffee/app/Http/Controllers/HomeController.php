<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;

class HomeController extends FrontendController
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $productHot= Product::where([
            'pro_hot'   => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC,
        ])->limit(7)->get();

        $articleNews = Article::where([
            'a_active'  => Article::STATUS_PUBLIC,
        ])->limit(3)->orderBy('id','DESC')->get();

        $viewData = [
            'productHot' => $productHot,
            'articleNews' =>$articleNews,
        ];
        return view('home.index',$viewData);
    }
}
