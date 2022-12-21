<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories= Category::select('id','c_name','c_title_seo','c_description_seo','c_active')->get();

        $viewData =[
            'categories' => $categories                                             
        ];  
        return view('admin::category.index',$viewData);
    }

    public function create()
    {
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory) // tạo dữ liệu 
    {
        $this->insertOrUpdate($requestCategory);
        return redirect('admin/category')->with('success','Đã thêm mới thành công !');//lùi về trang trước 
    }

    public function edit($id){ // tìm id của create để xuất
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

    public function update(RequestCategory $requestCategory,$id){
        $this->insertOrUpdate($requestCategory,$id);
        return redirect('admin/category');
    }

    public function insertOrUpdate($requestCategory,$id=''){
       
        $code = 1;
        try {
            $category=new Category();
            if($id){
                $category= Category::find($id);
            }
            $category->c_name=$requestCategory->name; //lệnh request check name trước rồi lưu name vào model category
            $category->c_slug=str::slug($requestCategory->name);
            $category->c_icon=str::slug($requestCategory->icon);
            $category->c_title_seo=$requestCategory->c_title_seo ? $requestCategory->c_title_seo:$requestCategory->name;
            $category->c_description_seo=$requestCategory->c_description_seo;
            $category->save();

        } catch (\Exception $exception)
        {
           $code=0;
           Log::error("[Error insertOrUpdate Categories]".$exception->getMessage());
        }

        return $code;
    }

    public function action($action,$id){
        if($action){
            $category=Category::find($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                        break;
            }
            return redirect()->back(); 
        }
    }
}
