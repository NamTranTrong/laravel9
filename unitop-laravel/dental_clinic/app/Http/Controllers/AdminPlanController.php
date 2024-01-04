<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Plan;
use App\Models\Staff;
use App\Models\Dentist;
use App\Models\Treatment;


class AdminPlanController extends Controller
{
    private $patient;
    private $plan;
    private $staff;
    private $dentist;
    private $treatment;
    public function __construct(Patient $patient,Plan $plan,
                                    Staff $staff,Dentist $dentist, Treatment $treatment){
        $this->patient = $patient;
        $this->plan = $plan;
        $this->staff = $staff;
        $this->dentist = $dentist;
        $this->treatment = $treatment;
    }
    public function index($mabn){
        $plans = $this->plan->where('MABN',$mabn)->get();
        $patient = $this->patient->where('MABN',$mabn)->first();
        return view('admin.plan.index',compact('plans','patient'));
    }


    public function add($mabn){
        $get_mabn = $mabn;
        $staffs = $this->staff->get();
        $dentists = $this->dentist->get();
        $treatments = $this->treatment->get();
        $status = ['0','1','2'];
        return view('admin.plan.add',compact('get_mabn','staffs','dentists','treatments','status'));
    }

    public function store($mabn,Request $request){
        $this->plan->create([
            'MAKH' => '11',
            'MABN' => $mabn,
            'MADT' => $request->madt,
            'MANS' => $request->mans,
            'MANV' => $request->manv,
            'NGAYDT' => $request->ngaydt,
            'MOTA' => $request->mota,
            'TRANGTHAI' => $request->trangthai,
        ]);

        return redirect()->route('list.plan',['mabn' => $mabn]);
    }

    public function edit($makh){
        $plan = $this->plan->where('MAKH', $makh)->first();
        $staffs = $this->staff->get();
        $dentists = $this->dentist->get();
        $treatments = $this->treatment->get();
        $status = ['0','1','2'];
        return view('admin.plan.edit',compact('plan','status','staffs','dentists','treatments'));
    }

    public function update($makh,Request $request){
        $plan = $this->plan->where('MAKH', $makh)->first();
        if ($plan) {
            $plan->update([
                'MADT' => $request->madt,
                'MANS' => $request->mans,
                'MANV' => $request->manv,
                'NGAYDT' => $request->ngaydt,
                'MOTA' => $request->mota,
                'TRANGTHAI' => $request->trangthai,
            ]);
            return redirect()->route('list.plan',['mabn' => $plan->MABN]);
        }
    }

}
