<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive\CategoryRecusive;
use App\Models\Product;
use EditorContent;
use Storage;

class AdminProductController extends Controller
{
    private $product;
    private $categoryRecusive;
    public function __construct(Product $product,CategoryRecusive $categoryRecusive){
        $this->product = $product;
        $this->categoryRecusive = $categoryRecusive;
    }
    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        $htmlSelect = $this->categoryRecusive->getCategoryAdd();
        return view('admin.product.create',compact('htmlSelect'));
    }

    public function store(Request $request){
        // $editorContent = new EditorContent;
        // $editorContent->content = $request->input('editor_content');
        // $editorContent->save();
        dd($request->input('editor_content'));
        // Xử lý và lưu từng hình ảnh
        foreach ($request->file() as $key => $file) {
            if (strpos($key, 'image') === 0) {
                $path = Storage::disk('public')->put('images', $file);
                // Lưu đường dẫn của hình ảnh vào cơ sở dữ liệu
                // Ví dụ: $editorContent->images()->create(['path' => $path]);
            }
        }
    
        return "Form submitted successfully!";
    }
}