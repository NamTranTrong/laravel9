<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestContact;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends FrontendController
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getContact(){
        return View('contact.index');
    }

    public function saveContact(RequestContact $requestcontact){
        $data=$requestcontact->except('_token');
        $data['updated_at']=$data['created_at']=Carbon::now();
        Contact::insert($data);

        return redirect()->back();
    }
}
