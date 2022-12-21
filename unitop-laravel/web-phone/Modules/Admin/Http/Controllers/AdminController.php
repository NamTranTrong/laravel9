<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contact;
use App\Models\Rating;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
        $contacts = Contact::limit(10)->get();
        $ratings=Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();

        $viewData = [
            'ratings' => $ratings,
            'contacts' => $contacts,
        ];
        return view('admin::index',$viewData);
    }       
}
