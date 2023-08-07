<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\Category;
use App\Components\Recusive\CategoryRecusive;
use App\Traits\DeleteModelTrait;

class AdminCategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;
    private $categoryRecusive;
    public function __construct(Category $category, CategoryRecusive $categoryRecusive){
        $this->category = $category;
        $this->categoryRecusive = $categoryRecusive;
    }
    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        $htmlSelect =  $this->categoryRecusive->getCategoryAdd();

        return view('admin.category.create',compact("htmlSelect"));
    }

    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route("category.index");
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlSelect =  $this->categoryRecusive->getCategoryEdit($category->parent_id);
        return view('admin.category.edit',compact('category','htmlSelect'));
    }

    public function update(Request $request,$id){
        $this->category->find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('category.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($this->category,$id);
    }
}
