<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::paginate(5);

        $viewData = [
            'categories' => $categories,
        ];
        return view('admin::category.index',$viewData);
    }

    public function create(){
    
        return view('admin::category.create');
    }

    public function insert(CategoryRequest $categoryRequest){
        $this->insertOrUpdate($categoryRequest);
        return redirect()->back()->with('success','Bạn đã thêm danh mục thành công');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, $id){
        $this->insertOrUpdate($categoryRequest, $id);
        return redirect('/admin/category');
    }

    public function insertOrUpdate(CategoryRequest $categoryRequest,$id=''){
        $category = new Category();
        if($id){
            $category = Category::find($id);
        }
        $category->ca_name = $categoryRequest ->ca_name;
        $category->ca_slug =str::slug($categoryRequest ->ca_name);
        $category ->ca_active = $categoryRequest->input('ca_active') ? 1 : 0 ;

        if($categoryRequest->hasFile('ca_avatar')){
            $file=upload_image('ca_avatar');
            if(isset($file['name'])){
                $category->ca_avatar = $file['name'];
            }
        }

        $category->save();
    }

    public function action($action,$id){
        if($action){
            $category = Category::find($id);
            switch($action){
                case 'active':
                    $category -> ca_active = $category->ca_active===1? 0:1; 
                    $category->save();
                    return redirect('admin/category')->with('success','Đã thay đổi trạng thái'); 
                    
                case 'delete':
                    $category->delete();
                    return redirect('admin/category')->with('success','Đã xóa Danh mục'); 
            }
        }
           
    }



    // public function updateActive(CategoryRequest $categoryRequest,$cate_id){
    //     $category = Category::find($cate_id)->where('id',$cate_id)->first();

    //     $category->update([
    //         'ca_active' => $categoryRequest->ca_active
    //     ]);

    //     return response()->json(['message'=>'Active changed']);
    // }
}
