<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use DB;
use Log;
use App\Traits\DeleteTrait;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    use DeleteTrait;

    public function __construct(Role $role,Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index(){
        $roles = $this->role->latest()->paginate(4);
        return view('admin.role.index',compact('roles'));
    }

    public function add(){
        $modules = $this->permission->where('parent_id',0)->get();
        return view('admin.role.create',compact('modules'));
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $role->permissions()->attach($request->permissions);
            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message :'.$exception->getMessage().'-------Line :'.$exception->getLine());
        }
    }

    public function edit($id){
        $role = $this->role->find($id);
        $modules = $this->permission->where('parent_id',0)->get();
        return view('admin.role.edit',compact('role','modules'));
    }

    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $role =  $this->role->find($id);
            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $role->permissions()->sync($request->permissions);
            DB::commit();
            return redirect()->route('role.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message :'.$exception->getMessage().'-------Line :'.$exception->getLine());
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->role);
    }
}
