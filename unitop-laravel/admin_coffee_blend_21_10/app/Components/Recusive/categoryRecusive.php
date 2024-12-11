<?php
namespace App\Components\Recusive;
use App\Models\Category;
class categoryRecusive
{
    private $category;
    private $html;
    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->html = "";
    }
    public function CategoryRecusive($parent_id = "0", $text = "")
    {
        $Category = $this->category->where("parent_id",$parent_id)->get();
        foreach ($Category as $categoryItem) {
            $this->html .= '<option value="' . $categoryItem["id"] . '" ' . (old("category_id") == $categoryItem["id"] ? 'selected' : '') . '>' . $text . $categoryItem['name'] . '</option>';
            $this->CategoryRecusive($categoryItem["id"], $text . "--");
        }
        return $this->html;
    }   

    public function CategoryRecusiveEdit($id, $parent_id = "0", $text = "")
    {
        $getCategoryOld = $this->category->find($id);
        $Category = $this->category->where("parent_id",$parent_id)->get();
        foreach ($Category as $categoryItem) {
                if(!empty($getCategoryOld['parent_id']) && $categoryItem['id'] == $getCategoryOld['parent_id']){
                    $this->html .= "<option selected value=" . $categoryItem["id"] .'" ' . (old("category_id") == $categoryItem["id"] ? 'selected' : '') . '>'. $text . $categoryItem['name'] . "</option>";
                }
                else{
                    $this->html .= "<option value=" . $categoryItem["id"] . '" ' . (old("category_id") == $categoryItem["id"] ? 'selected' : '') . '>' . $text . $categoryItem['name'] . "</option>";
                }
                $this->CategoryRecusiveEdit($id,$categoryItem["id"], $text . "--");
        }
        return $this->html;
    }
}


