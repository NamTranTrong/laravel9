<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Components\Recusive\CategoryRecusive;
use App\Models\Product;
use App\Traits\StorageImageTrait;
use App\Models\productImages;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use DB;
use Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $product;
    private $categoryRecusive;
    private $productImages;
    private $tag;
    public function __construct(Product $product,CategoryRecusive $categoryRecusive,productImages $productImages,Tag $tag){
        $this->product = $product;
        $this->categoryRecusive = $categoryRecusive;
        $this->productImages = $productImages;
        $this->tag = $tag;
    }
    public function index(){
        $products = $this->product->latest()->paginate(4);
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $htmlSelect = $this->categoryRecusive->getCategoryAdd();
        $tags = $this->tag->all();
        return view('admin.product.create',compact('htmlSelect','tags'));
    }

    public function store(ProductEditRequest $request){
        DB::beginTransaction();
        try{
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'content' => $request->content,
            ];
    
            $dataUploadImage = $this->StorageTraitUpload($request,'feature_image_path','product');
            if(!empty($dataUploadImage)){
                $dataProductCreate["feature_image_path"] = $dataUploadImage['file_path'];
                $dataProductCreate["feature_image_name"] = $dataUploadImage["file_name"];
            }
    
            $product = $this->product->create($dataProductCreate);
    
            if($request->hasFile('images')){
                foreach($request->images as $image){
                    $dataUploadImages = $this->StorageTraitUploadMultiple($image,'product');
                    $product->images()->create([
                        "image_path" => $dataUploadImages['file_path'],
                        "image_name" => $dataUploadImages["file_name"],
                    ]);
                }
            }
    
            foreach($request->tags as $tagItem){
                $tagInstance = $this->tag->FirstOrCreate([
                    'name' => $tagItem,
                ]);
                $tagIds[] = $tagInstance -> id;
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index')->withErrors($request->messages());
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message :' .$exception->getMessage().'----- Line : '.$exception->getLine());
        }
    }

    public function delete($id){
       return $this->deleteModelTrait($this->product,$id);
    }

    public function edit($id){
        $product = $this->product->find($id);
        $selectTags = $product->tags()->get();
        $tags = $this->tag->all();
        $htmlSelectCategory = $this->categoryRecusive->getCategoryEdit($product->category_id);
        $productDetailImagePath = $product->images()->get();
        return view('admin.product.edit',compact("product",'tags','htmlSelectCategory','selectTags',"productDetailImagePath"));
    }

    public function update(ProductEditRequest $request,$id){
      try{
        DB::beginTransaction();
        $product = $this->product->find($id);
        $dataProductUpdate = [
            "name" => $request -> name,
            "price" => $request -> price, 
            "user_id" => auth()->id(),
            "category_id" => $request -> category_id,
            "content" => $request->content,
        ];
        if($request->hasFile('feature_image_path')){
            $dataImageUpload = $this->StorageTraitUpload($request,'feature_image_path','product');
        }
        if(!empty($dataImageUpload)){
            $dataProductUpdate['feature_image_path'] = $dataImageUpload['file_path'];
            $dataProductUpdate['feature_image_name'] = $dataImageUpload['file_name'];
        }
        $product->update($dataProductUpdate);

        if($request->hasFile('images')){
            $files = $request->images;
            $this->productImages->where('product_id',$id)->delete();
            foreach($files as $file){
                $dataImageMultiple = $this->StorageTraitUploadMultiple($file,'product');
                $product->images()->create([
                    'image_path' => $dataImageMultiple['file_path'],
                    'image_name' => $dataImageMultiple['file_name'],
                ]);
            }
        }
        foreach($request->tags as $tag){
           $TagInstance = $this->tag->FirstOrCreate([
                "name" => $tag,
            ]);
            $tagIds[] = $TagInstance->id;
        }
        $product->tags()->sync($tagIds);
        DB::commit();
        return redirect()->route('product.index');
      }catch(\Exception $exception){
        DB::rollBack();
        Log::error("message :".$exception->getMessage()."----Line: ".$exception->getLine());
      }

    }

}