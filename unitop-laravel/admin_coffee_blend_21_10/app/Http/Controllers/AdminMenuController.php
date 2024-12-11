<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Components\Recusive\menuRecusive;
use Str;

class AdminMenuController extends Controller
{
    private $menu;
    private $menuRecusive;
    public function __construct (Menu $menu,menuRecusive $menuRecusive){
        $this->menu = $menu;
        $this->menuRecusive = $menuRecusive;
    }

    public function index(){
        $menus = $this->menu->latest()->paginate(4);
        return view('admin.menu.index',compact("menus"));
    }

    public function add(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menu.create',compact("optionSelect"));
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'slug' => str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('menu.index');
    }

    public function edit($id){
        $menu = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($id); 
        return view('admin.menu.edit',compact('menu','optionSelect'));
    } 

    public function update($id,Request $request){
        $menu = $this->menu->find($id)->update([
            'name' => $request->name,
            'slug' => str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('menu.index');
    }

    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('menu.index');
    }
}
