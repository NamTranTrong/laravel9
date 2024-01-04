<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Contraindications;
use App\Models\Medicine;
use App\Models\Status;
use App\Models\Tooth;

class AdminStatusController extends Controller
{
    private $patient;
    private $contraindication;
    private $medicine;
    private $status;
    private $tooth;
    public function __construct(Patient $patient,Contraindications $contraindication,Medicine $medicine,Status $status,Tooth $tooth){
        $this->patient = $patient;
        $this->contraindication = $contraindication;
        $this->medicine = $medicine;
        $this->status = $status;
        $this->tooth = $tooth;
    }
    public function index($makh){
        $patient = $this->patient->where('MABN',$makh)->first();
        $status = $this->status->where('MAKH',$makh)->get();
        return view('admin.status.index',compact('patient','status'));
    }

    public function edit($makh,$stt){
        $status = $this->status
                            ->where('MAKH', $makh)
                            ->where('STT', $stt)
                            ->first();
        $bemat = ['L','F','D','M','T','R'];
        return view('admin.status.edit',compact('status','bemat'));
    }

    public function update($makh,$stt,Request $request){
        $status = $this->status
            ->where([
                'MAKH' => $makh,
                'STT' => $stt,
            ])
        ->first();
        if ($status) {
            $status->update([
                'BEMAT' => $request->bemat,
            ]);
            return redirect()->route('list.status',['makh' => $makh]);
        }
    }
}
