<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use App\Models\Slider;
use Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    protected $slider;
    public function __construct(Slider $slider){
        $this->slider = $slider;
    }
    public function index(){
        $sliders = $this->slider->latest()->paginate(3);
        return view('admin.slider.index',compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderAddRequest $request){
        try{

            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
    
            $dataImageSlider = $this->storageTraitUpload($request,'image_path','slider');
    
            if(!empty($dataImageSlider)){
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
    
            $this->slider->create($dataInsert);
    
            return redirect()->route('slider.index');
        }catch(\Exception $exception){
            Log::error('Message :' .$exception->getMessage(). '--- Line :' . $exception->getLine());
            
        };
    }

    public function edit($id){
        $slider = $this->slider->find($id);

        return view('admin.slider.edit',compact('slider'));
    }

    public function update(SliderAddRequest $request,$id){
        try{    
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $dataImageUpdate = $this->storageTraitUpload($request,'image_path','slider');

        if(!empty($dataImageUpdate)){
            $dataUpdate['image_path'] = $dataImageUpdate['file_path'];
            $dataUpdate['image_name'] = $dataImageUpdate['file_name'];
        };

        $this->slider->find($id)->update($dataUpdate);

        return redirect()->route('slider.index');

        }catch(\Exception $exception){
            Log::error('message :' .$exception->getMessage(). '--- Line : ' .$exception->getLine());
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($this->slider,$id);
    }
}
