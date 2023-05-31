<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\Category;

class CategoryController extends Controller
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
        return view('admin.category.edit');
    }
}
