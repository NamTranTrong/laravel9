<?php

namespace App\Http\Controllers;

use App\Http\Requests\productAddRequest;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\Product_tags;
use Log;
use DB;
use PhpParser\Node\Stmt\TryCatch;


class AdminProductController extends Controller
{

    use StorageImageTrait;
    use DeleteModelTrait;
    private $product;
    private $productImages;
    private $category;
    private $tag;
    private $productTags;
    public function __construct(Product $product,ProductImage $productImages,Category $category,Tag $tag,Product_tags $productTags){
            $this->product = $product;
            $this->productImages = $productImages;
            $this->category = $category;
            $this->tag = $tag;
            $this->productTags = $productTags;
    }
    public function index(){
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }

    public function getCategory($parenId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parenId);

        return $htmlOption;
    }

    public function create($parentId=''){
        $htmlOption = $this->getCategory($parentId);

        return view('admin.product.create',compact('htmlOption'));
    }

    public function store(productAddRequest $request){
        DB::beginTransaction();
        try{
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
                $tagInstance =$this->tag->firstOrCreate([
                    'name' => $tagItem,
                ]); 
                $tagIds[] = $tagInstance->id; 
            };
            $product->tags()->attach($tagIds);
            DB::commit(); // chạy đến dòng này thì dữ liệu mới được phép insert vào 
            return redirect()->route('product.index');
        }catch(\Exception $exception){
            DB::rollBack(); // khi xảy ra lỗi rollback tất cả dữ liệu trên 
            Log::error('Message :' . $exception->getMessage() . 'Line :' . $exception->getLine());  
        }
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->id);
        return view('admin.product.edit',compact('product','htmlOption'));
    }

    public function update(Request $request,$id){
        DB::beginTransaction();
        try{
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request ->price,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id, 
                'content'  => $request->content,
            ];

            //Insert data to Product Image
            $dataUploadImage = $this->storageTraitUpload($request,'feature_image_path','product');
            if(!empty($dataUploadImage)){
                $dataProductUpdate['feature_image_path'] = $dataUploadImage['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataUploadImage['file_name'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
    
            //Insert data to Product Images
            if( $request->hasFile('image_path') ){
                $this->productImages->where('product_id',$id)->delete();
                foreach($request->image_path as $fileItem){
                    $dataUploadProductImages = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataUploadProductImages['file_path'],
                        'image_name' => $dataUploadProductImages['file_name'],
                    ]);
                }
            }
    
            foreach($request->tags as $tagItem){
                $tagInstance =$this->tag->firstOrCreate([
                    'name' => $tagItem,
                ]);
                $tagIds[] = $tagInstance->id; 
            };
            
            $product->tags()->sync($tagIds);

            DB::commit(); // chạy đến dòng này thì dữ liệu mới được phép insert vào 
            return redirect()->route('product.index');
        }catch(\Exception $exception){
            DB::rollBack(); // khi xảy ra lỗi rollback tất cả dữ liệu trên 
            Log::error('Message :' . $exception->getMessage() . 'Line :' . $exception->getLine());  
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($this->product,$id);
    }
}   
