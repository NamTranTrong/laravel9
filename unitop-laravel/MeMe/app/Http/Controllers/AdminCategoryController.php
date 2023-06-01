<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\Category;

class AdminCategoryController extends Controller
{

    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function index(){
        $categories = $this->category->latest()->paginate(2);
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route("category.index");
    }

    public function edit($id){
        $category = $this->category->find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $this->category->find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('category.index');
    }

    public function delete($id){
        try{
            $this->category->find($id)->delete();
            return response()->json([
                'code' => '200',
                'message' => 'success'
            ],200);
        }catch(\Exception $exception){
            
            \Log::error('message' . $exception->getMessage().'----line :' . $exception->getLine());
            return response()->json([
                'code' => '500',
                'message' => 'fail',
            ],500);
        }
    }
}
