<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function indexLogin()
    {
        Auth::logout();

        // Hủy phiên người dùng
        session()->invalidate();
        session()->regenerateToken();
        return view('login');
    }

    public function indexRegister()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (
            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $remember)
        ) {
            if (Session::has('cart')) {
                Session::flush();
            }

            return redirect()->route('home.index');
        }
    }

    public function postRegister(Request $request)
    {
    }
}
