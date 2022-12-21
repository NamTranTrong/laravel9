<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\GalleryImg;

class AdminGalleryImgController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */


    public function create($product_id){
        $pro_id = $product_id;
        $gallery_imgs = GalleryImg::where('product_id', $pro_id);
        return view('admin::gallery.index',compact('gallery_imgs'))->with(compact('pro_id'));
    }

     public function store(Request $request,$product_id){
        // $request -> validate([
        //     'files' => 'required',
        // ]);
        if($request->ajax()){
          dd('ákdjfh');
        }
     }
    // foreach($request->file['files'] as $key=>$file){
    //     $nameFile = $file->getClientOriginalName();                      
    //     $gallery_img = new GalleryImg();
    //     $gallery_img->ga_name = $nameFile;
    //     $gallery_img ->ga_pro_id = $product_id;
    //     $gallery_img ->save();
}