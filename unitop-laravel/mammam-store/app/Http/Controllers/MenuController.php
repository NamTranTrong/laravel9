<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Components\Recusive;

class MenuController extends Controller
{

    private $menu;
    public function __construct(Menu $menu){
        $this->menu = $menu;
    }

    public function index(){
        return view('menu.index');
    }

    public function create(){
        return view('menu.create');
    }
}
