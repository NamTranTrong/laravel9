<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    protected $user;
    protected $role;
    public function __construct(User $user,Role $role){
        $this->user = $user;
        $this->role = $role;   
    }
    public function index(){
        $users = $this->user->latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request){
        try{
            \DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->attach($request->role_id);
            \DB::commit();
            return redirect()->route('user.index');
        }catch(\Exception $exception){
            \DB::rollBack();
            Log::error('message :' .$exception->getMessage(). '--- Line :' . $exception->getLine());
        }
    }

    public function edit($id){
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;
        return view('admin.user.edit',compact('roles','user','roleOfUser'));
    }

    public function update(Request $request,$id){
        try{
            \DB::beginTransaction();
            $user = $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user =$this->user->find($id);
            $user->roles()->sync($request->role_id);
            \DB::commit();
            return redirect()->route('user.index');
        }catch(\Exception $exception){
            \DB::rollBack();
            Log::error('message :' .$exception->getMessage(). '--- Line :' . $exception->getLine());
        }
    }

    public function delete($id){
       return $this->deleteModelTrait($this->user,$id);
    }
}
