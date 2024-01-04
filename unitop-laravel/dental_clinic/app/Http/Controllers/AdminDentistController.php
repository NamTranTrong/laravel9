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
        $dentists = $this->dentist->paginate(10);
        return view('admin.dentist.index',compact('dentists'));
    }
}
