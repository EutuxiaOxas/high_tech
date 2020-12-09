<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Blog\Article;
use  App\Blog\Category;


class BlogController extends Controller
{
    public function index() {
    	$posts = Article::with(['categoria', 'autor'])->orderBy('id', 'DESC')->paginate(10);
    	$categorias = Category::with(['articles'])->get();
    	return view('blog.posts', compact('posts', 'categorias'));
    }

    public function postsWithCategorie($slug)
    {
    	$categoria = Category::with(['articles'])->where('slug', $slug)->first();
    	$categorias = Category::with(['articles'])->get();
    	$posts = $categoria->articles;
    	return view('blog.posts', compact('posts', 'categorias', 'categoria'));
    }


    public function post($slug)
    {
    	$post = Article::with(['categoria', 'autor'])->where('slug', $slug)->first();

    	return view('blog.show_post', compact('post'));
    }
}
