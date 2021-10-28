<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog\Article;
use App\Product;
use App\Subscriptor;
use Illuminate\Support\Facades\Auth;

use App\Mail\MessageContact;
use Illuminate\Support\Facades\Mail;

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

    //Enviar correo de contacto
    public function createMessage(Request $request){

        // validar info

        $mensaje = $request;

        Mail::to('alexisamm9261@gmail.com')->queue(new MessageContact($mensaje));
        
        return back()->with('info', 'Tu mensaje ha sido enviado con éxito');

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


    public function subscriber( $email ){

        $existEmail = Subscriptor::where('email', $email)->first();

        if( $existEmail ){
            return 'Ya estás suscrito!';
        }else{
            
            Subscriptor::create([
                'email' => $email
            ]);
            return 'Gracias por suscribirte!';
        }

    }
}
