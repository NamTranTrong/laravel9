<?php

namespace App\Components\Recusive;
use App\Models\Category;

class CategoryRecusive{

    private $category;
    private $html;

    public function __construct(Category $category){    
        $this->category = $category;
        $this->html = "";
    }
    public function getCategoryAdd($parent_id = 0,$subMark = ''){
        $category = $this->category->where('parent_id',$parent_id)->get();
        foreach($category as $categoryItem){
            $this->html .= "<option value=".$categoryItem->id.">".$subMark.$categoryItem->name."</option>";
            $this->getCategoryAdd($categoryItem->id,$subMark."--");
        }

        return $this->html;
    }

    public function getCategoryEdit($getParentId,$parent_id = 0,$subMark = ''){
        $category = $this->category->where('parent_id',$parent_id)->get();
        foreach($category as $categoryItem){
            if($categoryItem->id == $getParentId){
                $this->html .= "<option selected value=".$categoryItem->id.">".$subMark.$categoryItem->name."</option>";
            }
            else{
                $this->html .= "<option value=".$categoryItem->id.">".$subMark.$categoryItem->name."</option>";
            }
            $this->getCategoryEdit($getParentId,$categoryItem->id,$subMark."--");
        }

        return $this->html;
    }
}