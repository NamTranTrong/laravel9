<?php
namespace App\Components\Recusive;
use App\Models\Menu;

class menuRecusive
{
    private $menu;
    private $html;
    public function __construct(Menu $menu){
        $this->html = "";
        $this->menu = $menu;
    }

    public function menuRecusiveAdd($parent_id = "0",$text = ""){
        $menus = $this->menu->where("parent_id",$parent_id)->get();
        foreach($menus as $menu){
                $this->html.="<option value=".$menu['id'].">".$text.$menu['name']."</option>";
                $this->menuRecusiveAdd($menu['id'],$text."--");
        }
        return $this->html;
    }

    public function menuRecusiveEdit($id,$parent_id = "0",$text = ""){
        $menus = $this->menu->where("parent_id",$parent_id)->get();
        $getMenu = $this->menu->find($id);
        foreach($menus as $menu){
            if($menu['id'] == $getMenu['parent_id'] ){
                $this->html.="<option selected value=".$menu['id'].">".$text.$menu['name']."</option>";
            }
            else{
                $this->html.="<option value=".$menu['id'].">".$text.$menu['name']."</option>";
            }
            $this->menuRecusiveEdit($id,$menu['id'],$text."--");

        }
        return $this->html;
    }
}