<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class AdminMedicineController extends Controller
{
    private $medicine;

    public function __construct(Medicine $medicine){
        $this->medicine = $medicine;
    }

    public function index(){
        $medicines = $this->medicine->paginate(15);
        return view('admin.medicine.index',compact('medicines'));
    }

    public function add(){
        return view('admin.medicine.add');
    }

    public function store(Request $request){
        $this->medicine->create([
            'MATHUOC' => '11',
            'TENTHUOC' => $request->tenthuoc,
            'GIATHUOC' => $request->giathuoc,
        ]);
        return redirect()->route('list.medicine');
    }

    public function edit($mathuoc){
        $medicine = $this->medicine->where("MATHUOC",$mathuoc)->first();
            return view('admin.medicine.edit',compact('medicine'));
        }

    public function update($mathuoc,Request $request){ 
        $medicine = $this->medicine->where('MATHUOC',$mathuoc)->first();
        $medicine->update([
            'TENTHUOC' => $request->tenthuoc,
            'GIATHUOC' => $request->giathuoc,
        ]);
        return redirect()->route('list.medicine');
    }
}
