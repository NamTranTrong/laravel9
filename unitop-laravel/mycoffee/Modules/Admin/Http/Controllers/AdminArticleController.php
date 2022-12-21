<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $articles=Article::paginate(10);

        $viewData = [
            'articles' => $articles,
        ];
        return view('admin::article.index',$viewData);
    }

    public function create(){
        return view('admin::article.create');
    }

    public function edit($id){
        $article = Article::find($id);
        return view('admin::article.update',compact('article'));
    }

    public function update(RequestArticle $requestArticle,$id){
        $this->storeOrUpdate($requestArticle,$id);
        return redirect('admin/article');
    }

    public function store(RequestArticle $requestArticle){
        $this->storeOrUpdate($requestArticle);
        return redirect('admin/article');
    }

    public function storeOrUpdate(RequestArticle $requestArticle,$id=''){
        $article = new Article();
        if($id){
            $article= Article::find($id);
        }
        $article ->a_name= $requestArticle->a_name;
        $article ->a_slug  = str::slug($requestArticle->a_name);
        $article ->a_content =   $requestArticle->a_content;
        $article ->a_description = $requestArticle->a_description;
        $article ->created_at = Carbon::now();
        $article ->updated_at = Carbon::now();
        if($requestArticle->hasFile('a_avatar')){
            $file= upload_image('a_avatar');
            if(isset($file['name'])){
                $article->a_avatar = $file['name'];
            }
        }

        $article->save();
    }

    public function action($action, $id){
        if($action){
            $article = Article::find($id);
            switch($action){
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active = $article->a_active ? 0 : 1;
                    $article -> save();
                    break;    
            }
        }
        return redirect('admin/article');
    }

}
