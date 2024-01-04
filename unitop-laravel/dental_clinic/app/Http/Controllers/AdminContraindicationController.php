<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Contraindications;
use App\Models\Medicine;

class AdminContraindicationController extends Controller
{
    private $patient;
    private $contraindication;
    private $medicine;
    public function __construct(Patient $patient,Contraindications $contraindication,Medicine $medicine){
        $this->patient = $patient;
        $this->contraindication = $contraindication;
        $this->medicine = $medicine;
    }
    public function listContraindications($mabn){
        $contraindications = $this->contraindication->where('MABN',$mabn)->get();
        $patient = $this->patient->where('MABN',$mabn)->first();
        return view('admin.contraindication.list',compact('contraindications','patient'));
    }

    public function editContraindication($mabn,$mathuoc){
        $contraindication = $this->contraindication
                            ->where('MABN', $mabn)
                            ->where('MATHUOC', $mathuoc)
                            ->first();
        $status = ['Không dị ứng','Dị ứng nhẹ','Dị ứng nặng'];
        return view('admin.contraindication.edit',compact('contraindication','status'));
    }

    public function updateContraindication($mabn,$mathuoc,Request $request){
        $contraindication = $this->contraindication
            ->where([
                'MABN' => $mabn,
                'MATHUOC' => $mathuoc,
            ])
        ->first();
        if ($contraindication) {
            $contraindication->update([
                'TINHTRANGDIUNG' => $request->tinhtrangdiung,
            ]);
            return redirect()->route('list.contraindication',['mabn' => $mabn]);
        }
    }

    public function addContraindication($mabn){
        $get_mabn = $mabn;
        $status = ['Không dị ứng','Dị ứng nhẹ','Dị ứng nặng'];
        $medicines = $this->medicine->pluck('MATHUOC');
        return view('admin.contraindication.add',compact('medicines','status','get_mabn'));
    }

    public function storeContraindication($mabn,Request $request){
        $this->contraindication->create([
            'MABN' => $mabn,
            'MATHUOC' => $request->mathuoc,
            'TINHTRANGDIUNG' => $request->tinhtrangdiung,
        ]);

        return redirect()->route('list.contraindication',['mabn' => $mabn]);
    }

    public function deleteContraindication($mabn,$mathuoc){
        $this->contraindication
        ->where([
            'MABN' => $mabn,
            'MATHUOC' => $mathuoc,
        ])->delete();
        return response()->json([
                "message" => "success",
                "code" => 200,
        ],200);
    }
}
