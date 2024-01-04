<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Contraindications;
use App\Models\Medicine;

class AdminPatientController extends Controller
{
    private $patient;
    private $contraindication;
    private $medicine;
    public function __construct(Patient $patient,Contraindications $contraindication,Medicine $medicine){
        $this->patient = $patient;
        $this->contraindication = $contraindication;
        $this->medicine = $medicine;
    }
    public function index(){
        $patients = $this->patient->paginate(15);
        return view('admin.patient.index',compact('patients'));
    }

    public function add(){
        return view('admin.patient.add');
    }

    public function store(Request $request){
        $this->patient->create([
            'MABN'   => '11',
            'HOTEN' => $request->hoten,
            'EMAIL' => $request->email,
            'SDT'   => $request->sdt,
            'TUOI'  => $request->tuoi,
            'GIOITINH' => $request->gioitinh,
            'TONGQUANSK' => $request->tinhtrangsk,
        ]);

        return redirect()->route('list.patient');
    }

    public function edit($mabn){
        $patient = $this->patient->where('MABN',$mabn)->first();
        $genders = ['Nam','Nữ'];
        $status  = ['Khỏe mạnh','Tốt','Bình thường','Yếu']; 
        return view('admin.patient.edit',compact('patient','genders','status'));
    }

    public function update(Request $request,$mabn){
        $patient = $this->patient->where('MABN',$mabn)->first();
        $patient->update([
            'HOTEN' => $request->hoten,
            'EMAIL' => $request->email,
            'SDT'   => $request->sdt,
            'TUOI'  => $request->tuoi,
            'GIOITINH' => $request->gioitinh,
            'TONGQUANSK' => $request->tinhtrangsk,
        ]);
        
        return redirect()->route('list.patient');
    }


}
