<?php

namespace Modules\Admin\Http\Controllers;

use App\Helpers\function;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\GalleryImg;

use function Ramsey\Uuid\v1;

class AdminProductController extends Controller
{
     public function index(){
        $products = Product::with('category:id,ca_name');
        $products=$products->paginate(5);
        $categories = $this->getCategories();
        $gallery_imgs = $this->getGalleryImgs();

        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'gallery_imgs' => $gallery_imgs,
        ];

        return view('admin::product.index', $viewData);
    }

    public function create(){
        $categories = $this->getCategories();
        $gallery_imgs = $this->getGalleryImgs();
        $viewData = [
            'categories' => $categories,
            'gallery_imgs' => $gallery_imgs,
        ];

        return view('admin::product.create',$viewData);
    }

    public function insert(ProductRequest $ProductRequest){
        $this->insertOrUpdate($ProductRequest);

        return redirect()->back()->with('success','Đã thêm Sản Phẩm thành công');
    }

    public function update(ProductRequest $ProductRequest,$id){
        $this->insertOrUpdate($ProductRequest,$id);
        return redirect('admin/product');
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update',compact('product','categories'));
    }

    public function insertOrUpdate(ProductRequest $ProductRequest,$id='')
    {
        if($id){
            $product = Product::find($id);
        }
        $product->pro_name = $ProductRequest->pro_name;
        $product->pro_slug = Str::slug($ProductRequest->pro_name);
        $product->pro_description = $ProductRequest->pro_description;
        $product->pro_description_seo = $ProductRequest->pro_description_seo;
        $product->pro_price = $ProductRequest->pro_price;
        $product->pro_category_id = $ProductRequest->pro_category_id;
        $product->pro_active = $ProductRequest->input('pro_active')? 1 : 0;
        $product->pro_hot   = $ProductRequest->input('pro_hot') ? 1:0;

        if($ProductRequest->hasFile('pro_avatar')){
            $file = upload_image('pro_avatar');
            if(isset($file['name'])){
                $product->pro_avatar = $file['name'];
            }
        }

        $product->save();
    }

    public function getCategories(){
        return Category::all();
    }

    public function getGalleryImgs(){
        return GalleryImg::all();
    }

    public function action($action,$id){
        if($action){
            $product = Product::find($id);
            switch($action){
                case 'active':
                    $product->pro_active = $product -> pro_active == 1?0:1;
                    $product->save();
                    return redirect()->back()->with('success','Đã thay đổi trạng thái thành công !');
                case 'hot':
                    $product->pro_hot = $product -> pro_hot == 1?0:1;
                    $product->save();
                    return redirect()->back()->with('success','Đã thay đổi trạng thái thành công !');

                case 'delete':
                    $product->delete();
                    return redirect()->back()->with('success','Đã xóa sản phẩm thành công !');

            }
        }
    }

}
