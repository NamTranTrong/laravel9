<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products= Product::with('category:id,c_name')->paginate(10);
        $categories = $this->getCategories();

        $viewData = [
            'categories' => $categories,    
            'products'  => $products,
        ];

        return view('admin::product.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

     public function create(){
        $categories = $this->getCategories();
        return view('admin::product.create',compact('categories'));
     }

     public function getCategories(){
        return Category::all();
     }

     public function store(RequestProduct $requestProduct){
        $this->insertOrUpdate($requestProduct);
        return redirect('admin/product');
     }

     public function edit($id){
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update',compact('categories','product'));
     }

     public function update(RequestProduct $requestProduct,$id){
        $this->insertOrUpdate($requestProduct,$id);
        return redirect('admin/product');
     }

     public function insertOrUpdate(RequestProduct $requestProduct,$id=''){
        $product = new Product();
        if($id){
            $product = Product::find($id);
        }

        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str::slug($requestProduct->pro_name);
        $product -> pro_price = $requestProduct->pro_price;
        $product -> pro_sale   = $requestProduct->pro_sale;
        $product -> pro_description = $requestProduct->pro_description;
        $product -> pro_category_id = $requestProduct->pro_category_id;

        if($requestProduct->hasFile('avatar')){
            $file = upload_image('avatar');
            if(isset($file['name'])){
                $product->avatar = $file['name'];
            }
        }
        $product->save();
     }

    public function action($action,$id){
        if($action){
            $product = Product::find($id);
            switch($action){
                case 'delete':
                    $product->delete();
                    break;
                case 'active':
                    $product->pro_active= $product->pro_active ? 0 :1;
                    $product->save();
                    break;
                case 'hot' : 
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    break;
            }
        }
        return redirect('admin/product');
    }
}
