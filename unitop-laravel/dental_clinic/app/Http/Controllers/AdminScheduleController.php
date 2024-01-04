<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    private $schedule;
    private $dentist;

    public function __construct(Schedule $schedule,Dentist $dentist){
        $this->schedule = $schedule;
        $this->dentist = $dentist;
    }

    public function index($mans){
        $schedules = $this->schedule->where('MANS',$mans)->get();
        $dentist = $this->dentist->where('MANS',$mans)->first();
        return view('admin.schedule.index',compact('schedules','dentist'));
    }
}
