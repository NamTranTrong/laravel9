<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestMenu;
use App\Models\Menu;
use Illuminate\Support\Str;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $menu_s=Menu::paginate(10);
        $viewData = [
            'menu_s'=>$menu_s,
        ];
        return view('admin::menu.index',$viewData);
    }

    public function create(){
      
        return view('admin::menu.create');
    }

    public function store(RequestMenu $requestMenu){
        $this->insertOrUpdate($requestMenu);
        return redirect('admin/menu');
    }

    public function edit($id){
        $menu=Menu::find($id);
        return view('admin::menu.update',compact('menu'));
    }

    public function update(RequestMenu  $requestMenu,$id){
        $this->insertOrUpdate($requestMenu,$id);
        return redirect('admin/menu');
    }

    public function insertOrUpdate(RequestMenu $requestMenu,$id=''){    
        $menu= new Menu();
        if($id){
            $menu=Menu::find($id);
        }
        $menu->menu_name=$requestMenu->menu_name;
        $menu->menu_slug=str::slug($requestMenu->menu_name);
        $menu->save();
    }

    public function action($action,$id){
        if($action){
            $menu=Menu::find($id);
            switch($action){
                case 'delete':
                    $menu->delete();
                    break;
            }
        }
        return redirect('admin/menu');
    }
}
