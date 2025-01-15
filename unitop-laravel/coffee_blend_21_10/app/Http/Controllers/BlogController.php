<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function index()
    {
        $blogs = $this->blog->latest()->get();
        return view('blog.index', compact('blogs'));
    }

    public function getBlog($blogId)
    {
        $blog = $this->blog->find($blogId);

    
        $previousBlog = $this->blog->where('id', '<', $blogId)
            ->orderBy('id', 'desc')
            ->first();
    
        $nextBlog = $this->blog->where('id', '>', $blogId)
            ->orderBy('id', 'asc')
            ->first();
    
        return view('blog.blog-detail', compact('blog', 'previousBlog', 'nextBlog'));
    }
    
}
