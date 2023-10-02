<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;

class AdminRoleController extends Controller
{
    protected $role;
    protected $permission;
    public function __construct(Role $role,Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index(){
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index',compact('roles'));
    }

    public function create(){
        $getModules = $this->permission->where('parent_id','0')->get();
        return view('admin.role.create',compact('getModules'));
    }

    public function store(Request $request){
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,          
        ]);
        $role->permission()->attach($request->module_permission);
        return redirect()->route('role.index');
    }

    public function edit($id){
        $role = $this->role->find($id);
        return view('admin.role.edit',compact('role'));
    }

    public function update(Request $request,$id){
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        return redirect()->route('role.index');
        
    }
}
