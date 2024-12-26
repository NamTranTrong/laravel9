<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Components\Recusive\categoryRecusive;
use App\Traits\StorageImageTrait;
use App\Models\Tag;
use DB;
use Log;
use App\Models\ProductImage;
use App\Traits\DeleteTrait;
use App\Http\Requests\ProductAddRequest;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    use DeleteTrait;
    private $product;
    private $categoryRecusive;
    private $tag;
    private $productImage;
    private $deleteTrait;

    public function __construct(Product $product,categoryRecusive $categoryRecusive,Tag $tag,ProductImage $productImage){
        $this->product = $product;
        $this->categoryRecusive = $categoryRecusive;
        $this->tag = $tag;
        $this->productImage = $productImage;
    }

    public function index(Request $request){
        $paginateValue = $request->input('paginateValue',2);
        $products = $this->product->latest()->paginate($paginateValue);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.productTable', compact('products'))->render(),
                'pagination' => $products->appends(['paginateValue' => $paginateValue])->links()->toHtml() // Giữ lại per_page trong phân trang
            ]);
        }
        return view('admin.product.index',compact('products'));
    }

    public function add(){
        $htmlSelect = $this->categoryRecusive->CategoryRecusive();
        return view('admin.product.create',compact('htmlSelect'));
    }

    public function store(ProductAddRequest $request){
        try{
            DB::beginTransaction();
            $dataProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' =>auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataImage = $this->StorageImageTrait($request,'feature_image_path','products');
            if(!empty($dataImage)){
                $dataProduct['feature_image_path'] = $dataImage['image_path'];
                $dataProduct['feature_image_name'] = $dataImage['image_name'];
            };
            $product = $this->product->create($dataProduct);
            if($request->hasFile('image_path')){
                foreach($request->image_path as $imageItem){
                    $dataImageDetail = $this->StorageImageMultipleTrait($imageItem,'products',);
                    $product->images()->create([
                        'image_name' => $dataImageDetail['image_name'],
                        'image_path' => $dataImageDetail['image_path'],
                    ]);
                }
            }
    
            foreach($request->tags as $tagItem){
                $tagInstance = $this->tag->firstOrCreate([
                    'name' => $tagItem,
                ]);
                $tagIds[] =  $tagInstance->id;
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index',compact('dataProduct'));
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('message :' .$exception->getMessage().'-- Line:'. $exception->getLine());
        };
    }
    public function search(Request $request)
    {
        $valueSearch = $request->input('valueSearch');
    
        if (!$valueSearch) {
            return response()->json(['error' => 'Search value is empty'], 400);
        }
    
        $results = $this->product->with('images')->where('name', 'LIKE', '%' . $valueSearch . '%')->get();

        
        return response()->json(['data' => $results]);
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlSelect = $this->categoryRecusive->CategoryRecusiveEdit($product->category_id);
        return view('admin.product.edit',compact('product','htmlSelect'));
    }

    public function update(ProductEditRequest $request,$id){
        try{
            DB::beginTransaction();
            $product = $this->product->find($id);
            $dataProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' =>auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataImage = $this->StorageImageTrait($request,'feature_image_path','products');
            if(!empty($dataImage)){
                $dataProduct['feature_image_path'] = $dataImage['image_path'];
                $dataProduct['feature_image_name'] = $dataImage['image_name'];
            };  

            $product->update($dataProduct);

            if($request->hasFile('image_path')){
                $this->productImage->where('product_id',$id)->delete();
                foreach($request->image_path as $imageItem){
                    $dataImageDetail = $this->StorageImageMultipleTrait($imageItem,'products',);
                    $product->images()->create([
                        'image_name' => $dataImageDetail['image_name'],
                        'image_path' => $dataImageDetail['image_path'],
                    ]);
                }
            }
    
            foreach($request->tags as $tagItem){
                $tagInstance = $this->tag->firstOrCreate([
                    'name' => $tagItem,
                ]);
                $tagIds[] =  $tagInstance->id;
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index',compact('dataProduct'));
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('message :' .$exception->getMessage().'-- Line:'. $exception->getLine());
        };
    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->product);
    }

    public function deleteMultiple(Request $request){
        $productIds = $request->input('product_ids');
 
        if (empty($productIds) || !is_array($productIds)) {
            return response()->json(['success' => false, 'message' => 'Invalid data provided.'], 400);
        }
    
        try {
            // Ví dụ: Xóa danh mục
            $this->product->whereIn('id',$productIds)->delete();
            return response()->json([
                "massage" => "Success",
                "code" => "200",
            ],200);
        } catch (\Exception $e) {
            Log::error('Error deleting categories', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Server error occurred.'], 500);
        }
    }
}
