<?php

namespace App\Http\Controllers;

use App\Traits\DeleteTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;
use Log;
class AdminSliderController extends Controller
{
    use StorageImageTrait;
    use DeleteTrait;
    private $slider;

    public function __construct(Slider $slider){
        $this->slider = $slider;
    }
    public function index(){
        $sliders = $this->slider->latest()->paginate(3);
        return view('admin.slider.index',compact('sliders'));
    }

    public function add(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $dataImageSlider = $this->StorageImageTrait($request,'image_path','slider');
            $this->slider->create([
                'name' =>  $request->name,
                'description' => $request->description,
                'image_path' => $dataImageSlider['image_path'],
                'image_name' => $dataImageSlider['image_name'],
            ]);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message :'. $exception->getMessage() ."------Line :".$exception->getLine());
        }
    }

    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $slider = $this->slider->find($id);
        $dataImage = $this -> StorageImageTrait($request,'image_path','slide');
        $slider->update([
            'name' =>  $request->name,
            'description' => $request->description,
            'image_path' => $dataImage['image_path'],
            'image_name' => $dataImage['image_name'],
        ]);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message :'. $exception->getMessage() ."------Line :".$exception->getLine());
        }
    }

    public function delete($id){
       return $this->deleteModelTrait($id,$this->slider);
    }
}
