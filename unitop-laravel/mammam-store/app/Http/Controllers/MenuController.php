<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Components\MenuRecusive;
use Str;

class MenuController extends Controller
{

    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive,Menu $menu){
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->paginate(5);
        return view('menu.index',compact('menus'));
    }

    public function create(){
        $htmlOption = $this->menuRecusive->MenuRecusiveAdd();
        
        return view('menu.create',compact('htmlOption'));
    }

    public function store(Request $request){
        $menu = $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect(route('menu.index'));
    }

    public function edit($id){
        $menu = $this->menu->find($id);

        $selectOption = $this->menuRecusive->MenuRecusiveEdit($menu->parent_id);

        return view('menu.edit',compact('menu','selectOption')); 
    }

    public function update($id,Request $request){
        $menu = $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('menu.index');
    }

    public function delete($id){
        $menu = $this->menu->find($id)->delete();

        return redirect(route('menu.index'));
    }
}
