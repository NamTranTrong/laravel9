<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    protected $setting;
    public function __construct(Setting $setting){
        $this->setting = $setting ; 
    }

    public function index(){
        return view("admin.setting.index") ;
    }

    public function create(){
        return view("admin.setting.create") ;
    }
}
