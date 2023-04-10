<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Models\Setting;
use Log;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
    protected $setting;
    public function __construct(Setting $setting){
        $this->setting = $setting;
    }
    public function index(){
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index',compact('settings'));
    }

    public function create(){
        return view('admin.setting.create');
    }

    public function store(SettingAddRequest $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request-> config_value,
            'type' => $request->type,
        ]);

        return redirect()->route('setting.index');
    }

    public function edit($id){
        $setting = $this->setting->find($id);
        return view('admin.setting.edit',compact('setting'));
    }

    public function update(SettingAddRequest $request, $id){
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);

        return redirect()->route('setting.index');
    }

    public function delete($id){
       return $this->deleteModelTrait($this->setting,$id);
    }
}
