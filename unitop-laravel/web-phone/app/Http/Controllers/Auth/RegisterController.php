<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    
    public function getRegister(){
        return view('auth.register');
    }

    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function postRegister(RequestRegister $requestregister){
        $user = new User();
        $user->name=$requestregister->name;
        $user->email=$requestregister->email;
        $user->password=bcrypt($requestregister->password);
        $user->phone=$requestregister->phone;
        $user->save();

        if($user->id){
            return redirect()->route('get.login');
        }
        return redirect()->back();
    }
}