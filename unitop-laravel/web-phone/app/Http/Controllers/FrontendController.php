<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct(){
        $categories = Category::all();
        view::share('categories',$categories);
    }
}
