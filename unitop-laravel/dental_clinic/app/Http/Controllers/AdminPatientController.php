<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class AdminPatientController extends Controller
{
    private $patient;
    public function __construct(Patient $patient){
        $this->patient = $patient;
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
}
