<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use  App\Blog\Article;
use  App\Blog\Keyword;
use App\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Article::with(['categoria', 'autor'])->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(10)->get();
        return view('home.home', compact('posts','categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Controlador vista Nosotros
    public function nosotros()
    {
        $categories = Category::all();
        return view('nosotros.nosotros',compact('categories'));
    }

    //Controlador vista Contacto
    public function contacto()
    {
        $categories = Category::all();
        return view('contacto.contacto',compact('categories'));
    }

    public function cart(){
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(10)->get();
        return view('cart', compact('categories', 'products'));
    }

    public function sesionShoppingCar( $data ){
        session();
        session(['shoppingCar' => $data]);
        return 'success';
    }

    public function userIsLogin(){
        if(Auth::check()){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function loginToCreateOrder(){
        if( session()->has('shoppingCar') ){
            
            $categories = Category::all();
            return view('info', compact('categories'));

        }else{
            return route('home');
        }
    }
}
