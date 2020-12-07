<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscriber;
use App\Category;

class CmsController extends Controller
{
    public function index(){
    	return view('cms.index');
    }


    public function subscribersView(){
    	$subscriptores = Subscriber::all();
    	return view('cms.subscriptores')->with(compact('subscriptores'));
    }

    public function clubView(){
    	$users = User::all();
    	return view('cms.club')->with(compact('users'));
    }

    public function informationView(){
    	return view('cms.informacion');
    }

    public function categoryView(){
    	$categorias = Category::all();
    	return view('cms.categorias')->with(compact('categorias'));
    }
}
