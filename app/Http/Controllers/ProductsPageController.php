<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Auto_Parameter;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Posicion;
use App\Tipo_Cadena;
use App\Tipo_Chum;
use App\Tipo_Sello;

class ProductsPageController extends Controller
{
    private $perPage = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search))
        {
            $productos = Product::with(['categoria'])->where('titulo', 'LIKE', '%'.$request->search.'%')->paginate($this->perPage);
            $all_products = Product::with(['categoria'])->where('titulo', 'LIKE', '%'.$request->search.'%')->orWhere('codigo_universal', 'LIKE', '%'.$request->search.'%')->get();
        }else {
            $productos = Product::paginate($this->perPage);
            $all_products = Product::all();
        }

        $total_products = count($all_products);

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('productos.vitrina', compact('productos', 'categories', 'total_products', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));
    }
    // Busqueda sin filtro, solo con input search - Home
    public function showSearch(Request $request){
        $search = $request->search;

        $productos = Product::where('titulo', 'LIKE', "%{$search}%")
        ->orWhere('descripcion', 'LIKE', "%{$search}%")
        ->orWhere('aplicacion', 'LIKE', "%{$search}%")
        ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
        ->paginate($this->perPage);

        $total_productos =Product::where('titulo', 'LIKE', "%{$search}%")
        ->orWhere('descripcion', 'LIKE', "%{$search}%")
        ->orWhere('aplicacion', 'LIKE', "%{$search}%")
        ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
        ->get();
        $total_products = count($total_productos);

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('productos.vitrina', compact('productos', 'categories', 'total_products', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));

    }

    // Funcion que retorna la busqueda por categoria
    public function showByCategory($slug)
    {
        $categoria = Category::where('slug', $slug)->first();

        if( isset($categoria) && $categoria->products ){

            $productos = $categoria->products()->paginate($this->perPage);

            $total_products = count($categoria->products()->get());
        }else{
            $productos = [];
            $total_products = 0;
        }

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('productos.vitrina', compact('productos', 'categories', 'total_products', 'categoria', 'slug', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));

    }

    // Funcion que retorna la busqueda por el filtro
    public function showByFilter(Request $request)
    {
        $search = $request->search;
        $category_id = $request->category_id;
        $categoria = Category::where('id', $category_id)->first();

        if ( $categoria ){
            $slug = $categoria->slug;
        }else{
            $slug = null;
        }

        if($request->no_slug && $category_id == 0){

            $productos = Product::where('titulo', 'LIKE', "%{$search}%")
            ->orWhere('descripcion', 'LIKE', "%{$search}%")
            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
            ->orWhere('aplicacion', 'LIKE', "%{$search}%")
            ->paginate($this->perPage);

            $total_products = Product::where('titulo', 'LIKE', "%{$search}%")
            ->orWhere('descripcion', 'LIKE', "%{$search}%")
            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
            ->orWhere('aplicacion', 'LIKE', "%{$search}%")
            ->count();

        }else{

            switch ($category_id) {
                case 1: //Serie Auto

                    // Variables
                    $id_posicion_rueda = $request->rueda;

                    if( $id_posicion_rueda != 0){

                        if( $request->d_interno ){
                            $d_interno = $request->d_interno;
                            $d_externo = $request->d_externo;
                            $espesor = $request->espesor;

                            $productos = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('auto_parameters', function ($join) use ( $id_posicion_rueda, $d_interno, $d_externo, $espesor ){
                                $join->on('products.id', '=', 'auto_parameters.product_id')
                                ->where('auto_parameters.posicion_id', '=', $id_posicion_rueda)
                                ->where('auto_parameters.d_interno', '=', $d_interno)
                                ->where('auto_parameters.d_externo', '=', $d_externo)
                                ->where('auto_parameters.espesor', '=', $espesor);
                            })
                            ->paginate($this->perPage);

                            $total_products = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('auto_parameters', function ($join) use ( $id_posicion_rueda, $d_interno, $d_externo, $espesor ){
                                $join->on('products.id', '=', 'auto_parameters.product_id')
                                ->where('auto_parameters.posicion_id', '=', $id_posicion_rueda)
                                ->where('auto_parameters.d_interno', '=', $d_interno)
                                ->where('auto_parameters.d_externo', '=', $d_externo)
                                ->where('auto_parameters.espesor', '=', $espesor);
                            })
                            ->count();

                        }else{

                            $productos = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('auto_parameters', function ($join) use ( $id_posicion_rueda ){
                                $join->on('products.id', '=', 'auto_parameters.product_id')
                                ->where('auto_parameters.posicion_id', '=', $id_posicion_rueda);
                            })
                            ->paginate($this->perPage);

                            $total_products = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('auto_parameters', function ($join) use ( $id_posicion_rueda ){
                                $join->on('products.id', '=', 'auto_parameters.product_id')
                                ->where('auto_parameters.posicion_id', '=', $id_posicion_rueda);
                            })
                            ->count();

                        }

                    }elseif( $request->d_interno ){

                        $d_interno = $request->d_interno;
                        $d_externo = $request->d_externo;
                        $espesor = $request->espesor;

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->join('auto_parameters', function ($join) use ( $id_posicion_rueda, $d_interno, $d_externo, $espesor ){
                            $join->on('products.id', '=', 'auto_parameters.product_id')
                            ->where('auto_parameters.d_interno', '=', $d_interno)
                            ->where('auto_parameters.d_externo', '=', $d_externo)
                            ->where('auto_parameters.espesor', '=', $espesor);
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->join('auto_parameters', function ($join) use ( $id_posicion_rueda, $d_interno, $d_externo, $espesor ){
                            $join->on('products.id', '=', 'auto_parameters.product_id')
                            ->where('auto_parameters.d_interno', '=', $d_interno)
                            ->where('auto_parameters.d_externo', '=', $d_externo)
                            ->where('auto_parameters.espesor', '=', $espesor);
                        })
                        ->count();

                    }else{

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->count();

                    }

                    break;
                case 2: //Serie 6000

                    $id_tipo_sello = $request->tipo_sello;

                    if( $id_tipo_sello != 0){

                        if( $request->d_interno ){
                            $d_interno = $request->d_interno;
                            $d_externo = $request->d_externo;
                            $espesor = $request->espesor;

                            $productos = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('serie6000_parameters', function ($join) use ( $id_tipo_sello, $d_interno, $d_externo, $espesor ){
                                $join->on('products.id', '=', 'serie6000_parameters.product_id')
                                ->where('serie6000_parameters.tipo_sello_id', '=', $id_tipo_sello)
                                ->where('serie6000_parameters.d_interno', '=', $d_interno)
                                ->where('serie6000_parameters.d_externo', '=', $d_externo)
                                ->where('serie6000_parameters.espesor', '=', $espesor);
                            })
                            ->paginate($this->perPage);

                            $total_products = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('serie6000_parameters', function ($join) use ( $id_tipo_sello, $d_interno, $d_externo, $espesor ){
                                $join->on('products.id', '=', 'serie6000_parameters.product_id')
                                ->where('serie6000_parameters.tipo_sello_id', '=', $id_tipo_sello)
                                ->where('serie6000_parameters.d_interno', '=', $d_interno)
                                ->where('serie6000_parameters.d_externo', '=', $d_externo)
                                ->where('serie6000_parameters.espesor', '=', $espesor);
                            })
                            ->count();

                        }else{

                            $productos = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('serie6000_parameters', function ($join) use ( $id_tipo_sello ){
                                $join->on('products.id', '=', 'serie6000_parameters.product_id')
                                ->where('serie6000_parameters.tipo_sello_id', '=', $id_tipo_sello);
                            })
                            ->paginate($this->perPage);

                            $total_products = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('serie6000_parameters', function ($join) use ( $id_tipo_sello ){
                                $join->on('products.id', '=', 'serie6000_parameters.product_id')
                                ->where('serie6000_parameters.tipo_sello_id', '=', $id_tipo_sello);
                            })
                            ->count();

                        }

                    }elseif( $request->d_interno ){

                        $d_interno = $request->d_interno;
                        $d_externo = $request->d_externo;
                        $espesor = $request->espesor;

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->join('serie6000_parameters', function ($join) use ( $d_interno, $d_externo, $espesor ){
                            $join->on('products.id', '=', 'serie6000_parameters.product_id')
                            ->where('serie6000_parameters.d_interno', '=', $d_interno)
                            ->where('serie6000_parameters.d_externo', '=', $d_externo)
                            ->where('serie6000_parameters.espesor', '=', $espesor);
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->join('serie6000_parameters', function ($join) use ( $d_interno, $d_externo, $espesor ){
                            $join->on('products.id', '=', 'serie6000_parameters.product_id')
                            ->where('serie6000_parameters.d_interno', '=', $d_interno)
                            ->where('serie6000_parameters.d_externo', '=', $d_externo)
                            ->where('serie6000_parameters.espesor', '=', $espesor);
                        })
                        ->count();

                    }else{

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->count();

                    }

                    break;
                case 3: //Serie Moto
                    $id_tipo_sello = $request->tipo_sello;

                    if( $id_tipo_sello != 0){

                        if( $request->d_interno ){
                            $d_interno = $request->d_interno;
                            $d_externo = $request->d_externo;
                            $espesor = $request->espesor;

                            $productos = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('moto_parameters', function ($join) use ( $id_tipo_sello, $d_interno, $d_externo, $espesor ){
                                $join->on('products.id', '=', 'moto_parameters.product_id')
                                ->where('moto_parameters.tipo_sello_id', '=', $id_tipo_sello)
                                ->where('moto_parameters.d_interno', '=', $d_interno)
                                ->where('moto_parameters.d_externo', '=', $d_externo)
                                ->where('moto_parameters.espesor', '=', $espesor);
                            })
                            ->paginate($this->perPage);

                            $total_products = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('moto_parameters', function ($join) use ( $id_tipo_sello, $d_interno, $d_externo, $espesor ){
                                $join->on('products.id', '=', 'moto_parameters.product_id')
                                ->where('moto_parameters.tipo_sello_id', '=', $id_tipo_sello)
                                ->where('moto_parameters.d_interno', '=', $d_interno)
                                ->where('moto_parameters.d_externo', '=', $d_externo)
                                ->where('moto_parameters.espesor', '=', $espesor);
                            })
                            ->count();

                        }else{

                            $productos = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('moto_parameters', function ($join) use ( $id_tipo_sello ){
                                $join->on('products.id', '=', 'moto_parameters.product_id')
                                ->where('moto_parameters.tipo_sello_id', '=', $id_tipo_sello);
                            })
                            ->paginate($this->perPage);

                            $total_products = Product::where('category_id', $category_id)
                            ->where(function($query) use ($search) {
                                $query->where('titulo', 'LIKE', "%{$search}%")
                                ->orWhere('descripcion', 'LIKE', "%{$search}%")
                                ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                                ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                            })
                            ->join('moto_parameters', function ($join) use ( $id_tipo_sello ){
                                $join->on('products.id', '=', 'moto_parameters.product_id')
                                ->where('moto_parameters.tipo_sello_id', '=', $id_tipo_sello);
                            })
                            ->count();

                        }

                    }elseif( $request->d_interno ){

                        $d_interno = $request->d_interno;
                        $d_externo = $request->d_externo;
                        $espesor = $request->espesor;

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->join('moto_parameters', function ($join) use ( $d_interno, $d_externo, $espesor ){
                            $join->on('products.id', '=', 'moto_parameters.product_id')
                            ->where('moto_parameters.d_interno', '=', $d_interno)
                            ->where('moto_parameters.d_externo', '=', $d_externo)
                            ->where('moto_parameters.espesor', '=', $espesor);
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->join('moto_parameters', function ($join) use ( $d_interno, $d_externo, $espesor ){
                            $join->on('products.id', '=', 'moto_parameters.product_id')
                            ->where('moto_parameters.d_interno', '=', $d_interno)
                            ->where('moto_parameters.d_externo', '=', $d_externo)
                            ->where('moto_parameters.espesor', '=', $espesor);
                        })
                        ->count();

                    }else{

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion', 'LIKE', "%{$search}%");
                        })
                        ->count();

                    }

                    break;
                case 4: //Serie chumaceras
                    $id_tipo_brida = $request->tipo_brida;

                    if( $id_tipo_brida == 0 ){

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->count();

                    }else{

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->join('chumacera_parameters', function ($join) use ($id_tipo_brida){
                            $join->on('products.id', '=', 'chumacera_parameters.product_id')
                                ->where('chumacera_parameters.tipo_chum_id', '=', $id_tipo_brida);
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->join('chumacera_parameters', function ($join) use ($id_tipo_brida){
                            $join->on('products.id', '=', 'chumacera_parameters.product_id')
                                ->where('chumacera_parameters.tipo_chum_id', '=', $id_tipo_brida);
                        })
                        ->count();

                    }

                    break;
                case 5: //Serie CAdenas
                    $id_tipo_cadena = $request->tipo_cadena;

                    if ( $id_tipo_cadena == 0 ){

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->count();

                    }else{

                        $productos = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->join('cadena_parameters', function ($join) use ($id_tipo_cadena){
                            $join->on('products.id', '=', 'cadena_parameters.product_id')
                            ->where('cadena_parameters.tipo_cadena_id', '=', $id_tipo_cadena);
                        })
                        ->paginate($this->perPage);

                        $total_products = Product::where('category_id', $category_id)
                        ->where(function($query) use ($search) {
                            $query->where('titulo', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                            ->orWhere('aplicacion','LIKE', "%{$search}%");
                        })
                        ->join('cadena_parameters', function ($join) use ($id_tipo_cadena){
                            $join->on('products.id', '=', 'cadena_parameters.product_id')
                            ->where('cadena_parameters.tipo_cadena_id', '=', $id_tipo_cadena);
                        })
                        ->count();

                    }

                    break;
                default:
                    $productos = Product::where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                    ->paginate(15);

                    $total_productos = Product::where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->orWhere('codigo_universal', 'LIKE', "%{$search}%")
                    ->get();

                    break;
            }

        }

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('productos.vitrina', compact('productos', 'categories', 'search', 'total_products', 'categoria', 'slug', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));

    }

    //Detalles de producto
    public function show($slug)
    {
        $categories = Category::all();
        $producto = Product::where('slug', $slug)->first();
        $products = Product::where('category_id', $producto->category_id)->take(8)->get();
        return view('productos.productDetail', compact('producto', 'categories', 'products'));
    }
}
