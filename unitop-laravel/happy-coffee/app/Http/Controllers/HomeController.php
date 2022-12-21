<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Category;

class HomeController extends FrontendController
{
    /**
     * Create a new controller instance.
     *
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {   
        $productsHot = Product::where([
            'pro_hot' => 1,
            'pro_active' => 1,
        ])->paginate(5);
        return view('home.index',compact('productsHot'));
    }
}
