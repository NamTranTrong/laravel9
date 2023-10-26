<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;


class AdminSlideController extends Controller
{
    use StorageImageTrait;
    protected $slide;
    public function __construct(Slide $slide){
        $this->slide = $slide;
    }
    public function index(){
        $slides = $this->slide->latest()->paginate(5);
        return view("admin.slide.index", compact("slides"));
    }

    public function create(Request $request){
        return view('admin.slide.create');
    }

    public function store(Request $request){
        $dataSlideCreate = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $dataImage =  $this->StorageTraitUpload($request,'feature_image_path','slide');
        if(!empty($dataImage)){
           $dataSlideCreate["image_name"] =   $dataImage['file_name'];
           $dataSlideCreate['image_path'] =   $dataImage['file_path']; 
        };
        $this->slide->create($dataSlideCreate);

        return redirect()->route('slide.index');    
    }

    public function edit(Request $request, $id){
        $slide = $this->slide->find($id);
        return view('admin.slide.edit',compact('slide'));
    }

    public function update(Request $request, $id){
       $slide = $this->slide->find($id);
       $dataSlideUpdate = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $dataImage =  $this->StorageTraitUpload($request,'feature_image_path','slide');
        if(!empty($dataImage)){
           $dataSlideUpdate["image_name"] =   $dataImage['file_name'];
           $dataSlideUpdate['image_path'] =   $dataImage['file_path']; 
        };
        $slide->update($dataSlideUpdate);
        return redirect()->route('slide.index');
    }

}