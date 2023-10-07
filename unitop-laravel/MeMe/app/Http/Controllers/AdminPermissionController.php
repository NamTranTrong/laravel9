<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Str;
use Log;
use App\Http\Requests\PermissionAddRequest;

class AdminPermissionController extends Controller
{
    private $permission;
    private $category;
    private $role;
    public function __construct(Permission $permission,Category $category, Role $role){
        $this->permission = $permission;
        $this->category = $category;
        $this->role = $role;
        }
    public function index(){
        $getModules = $this->permission->where('parent_id','0')->paginate(5);
        return view('admin.permission.index',compact("getModules"));
    }

    public function create(){
        return view('admin.permission.create');
    }

    public function store(PermissionAddRequest $request){
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
        $module = $this->permission->find($id);
        $string_permission = $this->permission->where('parent_id',$id)->pluck('name');  
        foreach ($string_permission as $permission){
            $permissions[] = substr($permission, 0, strpos($permission, " "));
        }
        return view("admin.permission.edit",compact("module","permissions"));
    }

    public function update(Request $request,$id){
        $module = $this->permission->find($id);
        $module -> where('parent_id',$id)->delete();
        foreach($request->module_permission as $permission){
            $this->permission->create([
                'name' => Str::replaceFirst(' ', ' ', "$permission $request->module_table"),
                'display_name' => $permission.' '.$request->module_table,
                'parent_id' => $module->id,
                'key_code' => Str::lower($permission).'_'.Str::lower($request->module_table),
            ]);
        }
        return redirect()->route("permission.index");
    }

    public function delete($id){
        try{
            $module = $this->permission->find($id);
            $module -> where('parent_id',$id)->delete();
            $module->delete();
            return response()->json([
                "message" => "Success",
                "code" => "200",
            ],200);
        }catch(\Exception $exception){
            Log::error("message: " .$exception->getMessage()."--- Line: ".$exception->getLine());
            return response()->json([
                "message" => "Fail",
                "code" => "500",
            ],500);
        }

    }
}
