<?php

namespace App\Http\Controllers;

use App\Traits\DeleteTrait;
use Illuminate\Http\Request;
use App\Models\Setting;
class AdminSettingController extends Controller
{
    use DeleteTrait;
    private $setting;

    public function __construct(Setting $setting){
        $this->setting = $setting;
    }

    public function index(){
        $settings = $this->setting->latest()->paginate(3);
        return view('admin.setting.index',compact('settings'));
    }

    public function add(){
        return view('admin.setting.create');
    }

    public function store(Request $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);

        return redirect()->route('setting.index');
    }

    public function edit($id){
        $setting = $this->setting->find($id);
        return view('admin.setting.edit',compact('setting'));
    }

    public function update($id,Request $request){
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);
        return redirect()->route('setting.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->setting);
    }
}
