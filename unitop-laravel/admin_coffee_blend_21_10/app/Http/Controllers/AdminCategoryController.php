<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive\categoryRecusive;
use Str;
use Illuminate\Support\Facades\Log;
class AdminCategoryController extends Controller
{
    private $category;
    private $html;

    private $categoryRecusive;
    public function __construct(Category $category,categoryRecusive $categoryRecusive)
    {
        $this->category = $category;
        $this->categoryRecusive = $categoryRecusive;
    }
    public function index(Request $request)
    {
        $paginateValue = $request->input('paginateValue',3);
        $categories = $this->category->latest()->paginate($paginateValue);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.categoryTable', compact('categories'))->render(),
                'pagination' => $categories->appends(['paginateValue' => $paginateValue])->links()->toHtml() // Giữ lại per_page trong phân trang
            ]);
        }
        return view('admin.category.index',compact("categories"));
    }

    public function add()
    {   
        $htmlSelect = $this->categoryRecusive->CategoryRecusive();
        return view('admin.category.create',compact('htmlSelect'));
    }


    public function store(Request $request){
        $this->category->create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "parent_id" => $request->parent_id,
        ]);
        
        return redirect()->route('category.index');
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlSelect = $this->categoryRecusive->CategoryRecusiveEdit($id);
        return view('admin.category.edit',compact('htmlSelect','category'));
    }

    public function update(Request $request,$id){
        $this->category->find(id: $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('category.index');
    }

    public function delete($id){
        $category = $this->category->find($id);
        try {
            $categories = $this->category->all();
                foreach($categories as $categoryItem){
                    if($categoryItem['parent_id'] == $id){
                        return response()->json(["success" => false, "message" => "Tồn tại <".$category['name']."> là Danh Mục Cha!"]);
                    }
                }
            // Ví dụ: Xóa danh mục
            $category->delete();
            return response()->json([
                "massage" => "Success",
                "code" => "200",
            ],200);
        } catch (\Exception $e) {
            Log::error('Error deleting categories', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Server error occurred.'], 500);
        }
    }

    public function deleteMultiple(Request $request){
        $categoryIds = $request->input('category_ids');
        if (empty($categoryIds) || !is_array($categoryIds)) {
            return response()->json(['success' => false, 'message' => 'Invalid data provided.'], 400);
        }
    
        try {
            $categories = $this->category->all();
            foreach($categoryIds as $categoryId){
                foreach($categories as $categoryItem){
                    if($categoryItem['parent_id'] == $categoryId){
                        $category = $this->category->find($categoryId);
                        return response()->json(["success" => false, "message" => "Tồn tại <".$category['name']."> là Danh Mục Cha!"]);
                    }
                }
            }
            // Ví dụ: Xóa danh mục
            $this->category->whereIn('id',$categoryIds)->delete();
            return response()->json([
                "massage" => "Success",
                "code" => "200",
            ],200);
        } catch (\Exception $e) {
            Log::error('Error deleting categories', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Server error occurred.'], 500);
        }
    }
    public function search(Request $request)
    {
        $valueSearch = $request->input('valueSearch');
    
        if (!$valueSearch) {
            return response()->json(['error' => 'Search value is empty'], 400);
        }
    
        $results = $this->category->where('name', 'LIKE', '%' . $valueSearch . '%')->get();
    
        return response()->json(['data' => $results]);
    }
}