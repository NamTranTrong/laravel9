<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive\CategoryRecusive;
use App\Models\Product;
use App\Traits\StorageImageTrait;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $categoryRecusive;
    public function __construct(Product $product,CategoryRecusive $categoryRecusive){
        $this->product = $product;
        $this->categoryRecusive = $categoryRecusive;
    }
    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        $htmlSelect = $this->categoryRecusive->getCategoryAdd();
        return view('admin.product.create',compact('htmlSelect'));
    }

    public function store(Request $request){
        if($request->hasFile('feature_image_path')){
            $file = $request->name;
        }
        dd($file);
    }
}