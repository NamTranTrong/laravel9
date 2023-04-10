<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;

class AdminUserController extends Controller
{

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
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach($request->role_id);
        return redirect()->route('user.index');
    }

    public function edit($id){
        $roles = $this->role->all();
        $user = $this->user->find($id);

        $roleOfUser = $user->roles;
        return view('admin.user.edit',compact('roles','user','roleOfUser'));
    }
}
