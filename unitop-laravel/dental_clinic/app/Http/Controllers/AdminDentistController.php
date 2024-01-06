<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentist;

class AdminDentistController extends Controller
{
    private $dentist;

    public function __construct(Dentist $dentist){
        $this->dentist = $dentist;
    }

    public function index(){
        $dentists = $this->dentist->paginate(15);
        return view('admin.dentist.index',compact('dentists'));
    }
    
    public function add(){
        return view('admin.dentist.add');
    }

    public function store(Request $request){
        $this->dentist->create([
            'MANS' => '11',
            'HOTENNS' => $request->hoten,
            'SDTNS' => $request->sdt,
        ]);
        return redirect()->route('list.dentist');
    }

    public function edit($mans){
        $dentist = $this->dentist->where("MANS",$mans)->first();
            return view('admin.dentist.edit',compact('dentist'));
        }

    public function update($mans,Request $request){ 
        $dentist = $this->dentist->where('MANS',$mans)->first();
        $dentist->update([
            "HOTENNS" => $request->hoten,
            "SDTNS" => $request->sdt,
        ]);
        return redirect()->route('list.dentist');
    }


}
