<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CollectionController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function collectionByCategory($categoryId)
    {
        // Session::flush();    
        $category = $this->category->find($categoryId);
        $categories = $this->category->where('parent_id', '0')->get();
        $lv2Categories = [];
        foreach ($categories as $categoryItem) {
            if ($categoryItem->categoryChild()->count()) {
                $lv2Categories = $categoryItem->categoryChild;
            }
        }
        return view('product.collection', compact('category', 'lv2Categories', 'categories'));
    }

    public function getProductsByCategory($categoryId)
    {
        $categories = $this->category->where('parent_id', '0')->get();
        $category = $this->category->find($categoryId);
        
        // Thêm link để lấy route product
        $products = Product::where('category_id', $categoryId)->get()->map(function ($product) {
            // Thêm đường dẫn đến sản phẩm
            $product->link = route('product.getProduct', ['id' => $product->id]);
            return $product;
        });
        
        // Trả về danh sách sản phẩm dưới dạng JSON
        return response()->json([
            'products' => $products,
            'category' => $category,
        ]);
    }
}
