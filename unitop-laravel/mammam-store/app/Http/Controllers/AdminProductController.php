<?php

namespace App\Http\Controllers;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Str;
use Storage;
use App\Models\Tag;
use App\Models\Product_tags;


class AdminProductController extends Controller
{

    use StorageImageTrait;
    private $product;
    private $productImages;
    public function __construct(Product $product,ProductImage $productImages){
            $this->product = $product;
            $this->productImages = $productImages;
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

    public function store(Request $request){
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request ->price,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id, 
            'content'  => $request->content,
        ];
        $dataUploadImage = $this->storageTraitUpload($request,'feature_image_path','product');
        if(!empty($dataUploadImage)){
            $dataProductCreate['feature_image_path'] = $dataUploadImage['file_path'];
            $dataProductCreate['feature_image_name'] = $dataUploadImage['file_name'];
        }
        $product = $this->product->create($dataProductCreate);

        //Insert data to Product Images
        if( $request->hasFile('image_path') ){
            foreach($request->image_path as $fileItem){
                $dataUploadProductImages = $this->storageTraitUploadMultiple($fileItem,'product');
                $product->images()->create([
                    'image_path' => $dataUploadProductImages['file_path'],
                    'image_name' => $dataUploadProductImages['file_name'],
                ]);
            }
        }

        foreach($request->tags as $tagItem){
            $tagInstance =Tag::firstOrCreate([
                'name' => $tagItem,
            ]);
            $product_tags = Product_tags::create([
                'product_id' => $product->id,
                'tag_id' => $tagInstance->id,   
            ]);
        }
        return $product;
    }
}
