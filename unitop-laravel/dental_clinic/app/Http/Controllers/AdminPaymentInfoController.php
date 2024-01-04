<?php

namespace App\Http\Controllers;

use App\Models\PaymentInfo;
use Illuminate\Http\Request;

class AdminPaymentInfoController extends Controller
{
    private $paymentInfo;

    public function __construct(PaymentInfo $paymentInfo){
        $this->paymentInfo = $paymentInfo;
    }

    public function index(){
        $paymentInfos = $this->paymentInfo->paginate(15);
        return view('admin.paymentInfo.index',compact('paymentInfos'));
    }
}
