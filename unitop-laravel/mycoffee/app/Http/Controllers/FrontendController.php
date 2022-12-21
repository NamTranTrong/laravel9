<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
use App\Models\Category;


class FrontendController extends Controller
{
    public function __construct(){
        $menu_s = Menu::all();
        $categories = Category::where([
            'c_active' => Category::PUBLIC_STATUS,
        ])->paginate(20);
        view::share('menu_s',$menu_s);
        view::share('categories',$categories);
    }
}
