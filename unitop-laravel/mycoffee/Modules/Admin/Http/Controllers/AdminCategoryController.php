<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Http\Requests\RequestCategory;
use Illuminate\Support\Str;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories=Category::with('menu:id,menu_name')->paginate(10);
        $menu_s=$this->getMenu();
        $viewData=[
            'categories'  => $categories,
            'menu_s' => $menu_s,
        ];
        return view('admin::category.index',$viewData);
    }

    public function create(){
        $menu_s=$this->getMenu();
        return view('admin::category.create',compact('menu_s'));
    }

    public function store(RequestCategory $requestCategory){
        $this->insertOrUpdate($requestCategory);
        return redirect('admin/category');
    }

    public function edit($id){
        $category=Category::find($id);
        $menu_s=$this->getMenu();
        return view('admin::category.update',compact('category','menu_s'));
    }

    public function update(RequestCategory $requestCategory,$id){
        $this->insertOrUpdate($requestCategory,$id);
        return redirect('admin/category');
    }

    public function insertOrUpdate(RequestCategory $requestCategory,$id=''){
        $category = new Category();
        if($id){
            $category = Category::find($id);
        }
        $category -> c_name     =   $requestCategory->c_name;
        $category -> c_slug     =   str::slug($requestCategory->c_name);
        $category -> ca_menu_id =   $requestCategory->ca_menu_id;
        $category ->save();
    }

    public function getMenu(){
        return Menu::all();
    }

    public function action($action,$id){
        if($action){
            $category=Category::find($id);
            switch ($action){
                case 'delete':
                    $category->delete();
                    break;
                case 'active' :
                    $category->c_active = $category->c_active ? 0 : 1 ;
                    $category->save();
                    break;
            }
        }
        return redirect()->back();
    }
}
