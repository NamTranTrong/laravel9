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
        $medicines = $this->medicine->paginate(10);
        return view('admin.medicine.index',compact('medicines'));
    }
}
