<?php

namespace App\Http\Controllers;

use App\Traits\DeleteTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;

class AdminUserController extends Controller
{
    use DeleteTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role){
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->latest()->paginate(4);
        $roles =  $this->role->all();
        return view('admin.user.index',compact('users','roles'));
    }

    public function add(){
        $roles = $this->role->all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request){
        if($request->password != $request->confirm_pass){
            return redirect()->back()->withErrors(['error_pass' => 'Nhập lại xác nhận Password']);
        }
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach($request->role_ids);
        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        return view('admin.user.edit',compact('user','roles'));
    }

    public function update($id,Request $request){
        $user = $this->user->find($id);
       
        if( !Hash::check($request->confirm_pass,$user->password))
        {
            return redirect()->back()->withErrors([
                'error_pass' => 'Mật khẩu không chính xác',
            ]);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->confirm_pass),
        ]);
        $user->roles()->sync($request->role_ids);
        return redirect()->route('user.index');
    }   

    public function delete($id){
        return $this->deleteModelTrait($id,$this->user);
    }
}
