<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;

    public function __construct(Role $role){
        $this->role = $role;
    }
    public function index(){
        $roles = $this->role->latest()->paginate(4);
        return view('admin.role.index',compact('roles'));
    }
}
