<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Plan;
class AdminPrescriptionController extends Controller
{
    private $patient;
    private $plan;

    private $prescription;
    private $medicine;
    public function __construct(Patient $patient,Plan $plan,Prescription $prescription,Medicine $medicine){
        $this->patient = $patient;
        $this->plan = $plan;
        $this->prescription = $prescription;
        $this->medicine = $medicine;
    }
    public function index($makh){
        $prescriptions = $this->prescription->where('MAKH',$makh)->get();
        $plan = $this->plan->where('MAKH',$makh)->first();
        return view('admin.prescription.index',compact('prescriptions','plan'));
    }


    public function add($makh){
        $medicines = $this->medicine->get();
        $plan = $this->plan->where('MAKH',$makh)->first();
        return view('admin.prescription.add',compact('medicines','plan'));
    }
    public function store($makh,Request $request){
        $mathuoc = $request->mathuoc;
        $existingPrescription = $this->prescription->where('MAKH', $makh)->where('MATHUOC', $mathuoc)->first();
        if ($existingPrescription) {
            return redirect()->back()->with('error', 'Mã thuốc đã trùng hãy đổi loại thuốc khác !');
        }
        $this->prescription->create([
            'MAKH' => $makh,
            'MATHUOC' => $request->mathuoc,
            'SOLUONG' => $request->soluong,
        ]);
        return redirect()->route('list.prescription',['makh' => $makh]);
    }
    public function edit($makh,$mathuoc){
        $medicines = $this->medicine->get();
        $prescription = $this->prescription->where([
            'MAKH' => $makh,
            'MATHUOC' => $mathuoc,
        ])->first();
        return view('admin.prescription.edit',compact('medicines','prescription'));
    }

    public function update($makh,$mathuoc,Request $request){
        $get_mathuoc = $request->mathuoc;

        $existingPrescription = $this->prescription->where('MAKH', $makh)->where('MATHUOC', $get_mathuoc)->first();
    
        if ($existingPrescription) {
            return redirect()->back()->with('error', 'Mã thuốc đã trùng hãy đổi loại thuốc khác !');
        }
        $prescription = $this->prescription->where([
            'MAKH' => $makh,
            'MATHUOC' => $mathuoc,
        ]);
        $prescription->update([
            'MAKH' => $makh,
            'MATHUOC' => $request->mathuoc,
            'SOLUONG' => $request->soluong,
        ]);

        return redirect()->route('list.prescription',['makh' => $makh]);
    }

    public function delete($makh,$mathuoc){
        $prescription = $this->prescription->where([
            'MAKH' => $makh,
            'MATHUOC' => $mathuoc,
        ])->delete();
        return response()->json([
                "message" => "success",
                "code" => 200,
        ],200);
    }

}
