<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Blog\Article;
use  App\Blog\Category;
use  App\Blog\Keyword;

class BlogController extends Controller
{
    public function index() {
    	$posts = Article::with(['categoria', 'autor'])->orderBy('id', 'DESC')->paginate(15);
        $tags = Keyword::all();
        $latest_posts = Article::orderBy('id', 'DESC')->take(5)->get();
    	$categorias = Category::with(['articles'])->get();
    	return view('blog.posts', compact('posts', 'categorias', 'latest_posts', 'tags'));
    }

    public function postsWithCategorie($slug)
    {
    	$categoria = Category::with(['articles'])->where('slug', $slug)->first();
    	$categorias = Category::with(['articles'])->get();
        $tags = Keyword::all();
        $latest_posts = Article::orderBy('id', 'DESC')->take(5)->get();
    	$posts = $categoria->articles()->paginate(15);
    	return view('blog.posts', compact('posts', 'categorias', 'categoria', 'tags', 'latest_posts'));
    }


    public function postByTag($keyword)
    {
        $tag = Keyword::where('keyword', $keyword)->first();
        $tags = Keyword::all();
        $categorias = Category::with(['articles'])->get();
        $latest_posts = Article::orderBy('id', 'DESC')->take(5)->get();
        $posts = $tag->articles()->paginate(15);

        return view('blog.posts', compact('posts', 'categorias', 'tag', 'tags', 'latest_posts'));
    }


    public function post($slug)
    {
    	$post = Article::with(['categoria', 'autor', 'keywords'])->where('slug', $slug)->first();
        $other_posts = Article::with(['categoria'])->inRandomOrder()->where('id', '!=', $post->id)->take(3)->get();
    	return view('blog.show_post', compact('post', 'other_posts'));
    }
}
