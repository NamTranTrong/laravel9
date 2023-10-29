<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\Compilers\CompilerInterface;

class AdminSettingController extends Controller
{
    protected $setting;
    public function __construct(Setting $setting){
        $this->setting = $setting ; 
    }

    public function index(){
        $settings = $this->setting->latest()->paginate(5);
        return view("admin.setting.index",compact('settings')) ;
    }

    public function create(){
        return view("admin.setting.create") ;
    }

    public function store(Request $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);

        return redirect()->route('setting.index') ;
    }

    public function edit(Request $request,$id){
        $setting = $this->setting->find($id);
        return view('admin.setting.edit',compact('setting'));
    }

    public function update(Request $request,$id){
        $setting = $this->setting->find($id);
        $setting->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);

        return redirect()->route('setting.index');
    }
}
