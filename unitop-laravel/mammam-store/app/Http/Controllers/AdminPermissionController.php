<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class AdminPermissionController extends Controller
{

    protected $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function create(){
        return view('admin.permission.create');
    }

    public function store(Request $request){
        $permission = $this->permission->create([
            'name' => $request->module_table,
            'display_name' => $request->module_table,
            'parent_id' => 0,
            'key_code' => 'null',
        ]);

        foreach($request->module_permission as $module_permission)
        $permission->create([
            'name' => $module_permission." ".$request->module_table,
            'display_name' => $module_permission." ".$request->module_table,
            'parent_id' => $permission->id,
            'key_code' => $module_permission.'_'.$request->module_table,
        ]);
        return redirect()->route('permission.create');
    }
}
