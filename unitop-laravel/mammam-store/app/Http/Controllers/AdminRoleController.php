<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\DB;


class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    protected $role;
    protected $permission;
    public function __construct(Role $role,Permission $permission){
        $this->role = $role;
        $this->permission =$permission;
    }
    public function index(){
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index',compact('roles'));
    }

    public function create(){
        $permissionParents = $this->permission->where('parent_id',0)->get();
        
        return view('admin.role.create',compact('permissionParents'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
    
            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('role.index');
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('message :' .$exception->getMessage().'---- Line :' .$exception->getLine());
        }

    }

    public function edit($id){
        $permissionParents = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permissions;

        return view('admin.role.edit',compact('permissionParents','role','permissionChecked'));
    }

    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            $role = $this->role->find($id);
            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
    
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('role.index');
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('message :' .$exception->getMessage().'---- Line :' .$exception->getLine());
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($this->role,$id);
    }

}
