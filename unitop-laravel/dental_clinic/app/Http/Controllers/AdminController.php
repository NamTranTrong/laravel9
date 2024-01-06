<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    public function loginUser(){
        // $this->user->create([
        //     'name' => 'Administrator',
        //     'email' => 'Administrator@gmail.com',
        //     'password' => Hash::make('12345'),
        // ]);
        return view('login');
    }

    public function postLoginUser(Request $request){
        $remember = $request->has('remember-me')?true :false;
       if(Auth()->attempt(['email' => $request->email, 'password' => $request->password],$remember)){
            return redirect()->route('list.patient');
       }
    }

}
