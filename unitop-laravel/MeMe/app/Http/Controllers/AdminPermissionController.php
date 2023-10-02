<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Permission;
use Str;

class AdminPermissionController extends Controller
{
    private $permission;
    private $category;
    public function __construct(Permission $permission,Category $category){
        $this->permission = $permission;
        $this->category = $category;
    }
    public function index(){
        $getModules = $this->permission->where('parent_id','0')->paginate(5);
        return view('admin.permission.index',compact("getModules"));
    }

    public function create(){
        return view('admin.permission.create');
    }

    public function store(Request $request){
        $module = $this->permission->create([
            'name' => $request->module_table,
            'display_name' => $request->module_table,
            'parent_id' => 0,
            'key_code' => "null",
        ]);
        foreach($request->module_permission as $permission){
            $this->permission->create([
                'name' => Str::replaceFirst(' ', ' ', "$permission $request->module_table"),
                'display_name' => $permission.' '.$request->module_table,
                'parent_id' => $module->id,
                'key_code' => Str::lower($permission).'_'.Str::lower($request->module_table),
            ]);
        }
        return redirect()->route('permission.index');
    }

    public function edit($id){
        $permission = $this->permission->find($id);
        return view("admin.permission.edit",compact("permission"));
    }

    public function update(Request $request,$id){
        $permission = $this->permission->find($id);
    }
}
