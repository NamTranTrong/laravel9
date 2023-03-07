<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Category;
use Str;


class CategoryController extends Controller
{

    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->paginate(5);
        return view('category.index',compact('categories'));
    }

    public function create($parentId=''){
        $htmlOption = $this->getCategory($parentId);

        return view('category.add', compact('htmlOption'));
    }   

    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect(route('category.index'));
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);

        return $htmlOption;
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('category.edit',compact('category','htmlOption'));
    }

    public function update($id,Request $request){
        $category = $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect(route('category.index'));
    }

    public function delete($id){
        $category = $this->category->find($id)->delete();
        
        return redirect(route('category.index'));
    }
}
