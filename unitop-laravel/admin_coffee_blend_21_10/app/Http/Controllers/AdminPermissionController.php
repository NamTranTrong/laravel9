<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission){
        $this->permission = $permission;
    }

    public function index(){
        $permissions = $this->permission->all();
        $permissionParents = $this->permission->where('parent_id','0')->paginate(4);
        return view('admin.permission.index',compact('permissions','permissionParents'));
    }

    public function add(){
        return view('admin.permission.create');
    }

    public function store(Request $request){
        $permission = $this->permission->create([
            'name' => $request->module,
            'display_name' => $request->module,
            'parent_id' => 0,
            'key_code' => '',
        ]);

        foreach($request->permission_check as $modulePermission){
            $this->permission->create([
                'name' => $modulePermission,
                'display_name' => $modulePermission,
                'parent_id' => $permission->id,
                'key_code' => $request->module.'_'.$modulePermission,
            ]);
        }

        return redirect()->route('permission.index');
    }
}
