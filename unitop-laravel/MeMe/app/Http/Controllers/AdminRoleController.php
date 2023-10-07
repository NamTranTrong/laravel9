<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Models\Role;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
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
        $getModules = $this->permission->where('parent_id','0')->get();
        $role = $this->role->find($id);
        $permissions = $role->permission->pluck('name');
        return view('admin.role.edit',compact('role','getModules','permissions'));
    }

    public function update(Request $request,$id){
        $role = $this->role->find($id);
        $role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permission()->sync($request->module_permission);
        return redirect()->route('role.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($this->role,$id);
    }
}
