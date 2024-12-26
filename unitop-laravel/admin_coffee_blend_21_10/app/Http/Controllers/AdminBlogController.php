<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;

class AdminBlogController extends Controller
{
    protected $blog;
    use StorageImageTrait;
    public function __construct(Blog $blog){
        $this->blog = $blog;
    }
    public function index(){
        $blogs = $this->blog->latest()->paginate(3);
        return view('admin.blog.index',compact('blogs'));
    }

    public function add(){
        return view('admin.blog.create');
    }

    public function store(Request $request){
        $dataBlog = [
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ];

        $dataImgBlog = $this->StorageImageTrait($request,'feature_image_path','blog');
        if(!empty( $dataImgBlog)){
            $dataBlog['feature_image_path'] = $dataImgBlog['image_path'];
            $dataBlog['feature_image_name'] = $dataImgBlog['image_name'];
        }
        $this->blog->create($dataBlog);
        return redirect()->route('blog.index');
    }

    public function edit($id){
        $blog = $this->blog->find($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function update(Request $request,$id){
        $blog = $this->blog->find($id);
        $dataBlog = [
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ];

        $dataImgBlog = $this->StorageImageTrait($request,'feature_image_path','blog');
        if(!empty( $dataImgBlog)){
            $dataBlog['feature_image_path'] = $dataImgBlog['image_path'];
            $dataBlog['feature_image_name'] = $dataImgBlog['image_name'];
        }
        $blog->update($dataBlog);
        return redirect()->route('blog.index');
    }
}
