<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminApointmentController extends Controller
{
    private $apointment;

    public function __construct(Appointment $apointment){
        $this->apointment = $apointment;
    }

    public function index(){
        $apointments = $this->apointment->paginate(15);
        return view('admin.apointment.index',compact('apointments'));
    }

    public function delete($mach){
        $this->apointment->where('MACH',$mach)->delete();
        return response()->json([
                "message" => "success",
                "code" => 200,
        ],200);
    }
}
