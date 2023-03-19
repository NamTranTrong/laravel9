<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{

    private $product;
    public function __construct(Product $product){
            $this->product = $product;
    }
    public function index(){
        return view('admin.product.index');
    }

    public function getCategory($parenId){
        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parenId);

        return $htmlOption;
    }

    public function create($parentId=''){
        $htmlOption = $this->getCategory($parentId);

        return view('admin.product.create',compact('htmlOption'));
    }
}
