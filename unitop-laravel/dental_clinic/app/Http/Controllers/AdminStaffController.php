<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class AdminStaffController extends Controller
{
    private $staff;

    public function __construct(Staff $staff){
        $this->staff = $staff;
    }

    public function index(){
        $staffs = $this->staff->paginate(10);
        return view('admin.staff.index',compact('staffs'));
    }
}
