<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Article;
use App\Http\Requests\RequestArticle;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {  
        $articles=Article::whereRaw(1);

        if($request->name) $articles->where('a_name','like',"%".$request->name."%");

        $articles=$articles->paginate(10);
        $viewData=[
            'articles' =>$articles,
        ];
        return view('admin::article.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function create(){
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle){
        $this->insertOrUpdate($requestArticle);
        return redirect('admin/article');
    }

    public function edit($id){
        $article=Article::find($id);
        return view('admin::article.update',compact('article'));
    }

    public function update(RequestArticle $requestArticle,$id){
        $this->insertOrUpdate($requestArticle,$id);
        return redirect('admin/article');
    }

    public function insertOrUpdate($requestArticle,$id=''){
        $article= new Article();
        if($id){
            $article=Article::find($id);
        }
        $article->a_name=$requestArticle->a_name;
        $article->a_slug=str::slug($requestArticle->a_name);
        $article->a_content=$requestArticle->a_content;
        $article->a_description=$requestArticle->a_description;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo :$requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo :$requestArticle->a_description_seo;

        if($requestArticle->hasFile('avatar')){
            $file= upload_image('avatar');
            if(isset($file['name'])){
                $article->a_avatar = $file['name'];
            }
        }

        $article->save();
    }

    public function action($action,$id){
        if($action){
            $article=Article::find($id);
            switch($action){
                case 'delete':
                    $article->delete();
                    break;
                case'active':
                    $article->a_active=$article->a_active===1?0 :1;
                    $article->save();
                    break;
            }
            return redirect()->back();
        }   
    }
}
