<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = Contact::paginate('10');

        $viewData=[
            'contacts' => $contacts,
        ];

        return view('admin::contact.index',$viewData);
    }

    public function action($action,$id){
        if($action)
        {
            $contact=Contact::find($id);
            switch($action){
                case 'status':
                    $contact->con_status=$contact->con_status ? 0 :1;
                    $contact->save();
                    break;
            }
            return redirect()->back(); 
        }
    }

}
