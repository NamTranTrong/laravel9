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
        $staffs = $this->staff->paginate(15);
        return view('admin.staff.index',compact('staffs'));
    }

    public function add(){
        return view('admin.staff.add');
    }

    public function store(Request $request){
        $this->staff->create([
            'MANV' => '11',
            'HOTENNV' => $request->hoten,
            'SDTNV' => $request->sdt,
        ]);
        return redirect()->route('list.staff');
    }

    public function edit($manv){
        $staff = $this->staff->where("MANV",$manv)->first();
            return view('admin.staff.edit',compact('staff'));
        }

    public function update($manv,Request $request){ 
        $staff = $this->staff->where('MANV',$manv)->first();
        $staff->update([
            'HOTENNV' => $request->hoten,
            'SDTNV' => $request->sdt,
        ]);
        return redirect()->route('list.staff');
    }
}
