<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        if(empty(auth()->user())){
            return view('login');
        }
        return view('home');
    }
    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        $rememeber = $request->has('remember')?true:false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,   
        ],$rememeber)){
            return view('home');
        }
        return back()->withErrors([
            'fail' => 'Thông tin đăng nhập không chính xác.',
        ])->withInput();
    }

    public function postRegister(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        try {
            // Tạo người dùng mới trong cơ sở dữ liệu
            $this->user->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
    
            return redirect()->route('login')->with('success', 'Đăng ký thành công.');
        } catch (\Exception $e) {
            // In ra lỗi nếu có vấn đề khi tạo người dùng
            dd($e->getMessage());
        }
    }
}
