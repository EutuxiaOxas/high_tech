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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search))
        {
            $productos = Product::with(['categoria'])->where('titulo', 'LIKE', '%'.$request->search.'%')->paginate(15);
            $all_products = Product::with(['categoria'])->where('titulo', 'LIKE', '%'.$request->search.'%')->get();
        }else {
            $productos = Product::paginate(15);
            $all_products = Product::all();
        }

        $total_products = count($all_products);

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('vitrina', compact('productos', 'categories', 'total_products', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));
    }

    // Funcion que retorna la busqueda por categoria
    public function showByCategory($slug)
    {
        $categoria = Category::where('slug', $slug)->first();

        if( $categoria->products ){

            $productos = $categoria->products()->paginate(15);

            $total_products = count($categoria->products()->get());
        }else{
            $productos = [];
        }

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('vitrina', compact('productos', 'categories', 'total_products', 'categoria', 'slug', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));

    }

    // Funcion que retorna la busqueda por el filtro
    public function showByFilter(Request $request)
    {
        $category_id = $request->category_id;

        $categoria = Category::where('id', $category_id)->first();

        $slug = $categoria->slug;

        $search = $request->search;
        if($request->no_slug){

            $productos = Product::where('category_id', $category_id)
            ->where('titulo', 'LIKE', "%{$search}%")
            ->orWhere('descripcion', 'LIKE', "%{$search}%")
            ->paginate(15);

            $total_productos = Product::where('category_id', $category_id)
            ->where('titulo', 'LIKE', "%{$search}%")
            ->orWhere('descripcion', 'LIKE', "%{$search}%")
            ->get();

        }else{
            switch ($category_id) {
                case 1: //Serie Auto

                    $id_posicion_rueda = $request->rueda;

                    $productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('auto_parameters', function ($join) use ($id_posicion_rueda,$search){
                        $join->on('products.id', '=', 'auto_parameters.product_id')
                            ->where('auto_parameters.posicion_id', '=', $id_posicion_rueda)
                            ->orWhere('auto_parameters.aplicacion','=', $search);
                    })
                    ->paginate(15);

                    $total_productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('auto_parameters', function ($join) use ($id_posicion_rueda,$search){
                        $join->on('products.id', '=', 'auto_parameters.product_id')
                            ->where('auto_parameters.posicion_id', '=', $id_posicion_rueda)
                            ->orWhere('auto_parameters.aplicacion','=', $search);
                    })
                    ->get();

                    break;
                case 2: //Serie 6000

                    $id_tipo_sello = $request->tipo_sello;

                    $productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('serie6000_parameters', function ($join) use ($id_tipo_sello){
                        $join->on('products.id', '=', 'serie6000_parameters.product_id')
                            ->where('serie6000_parameters.tipo_sello_id', '=', $id_tipo_sello);
                    })
                    ->paginate(15);

                    $total_productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('serie6000_parameters', function ($join) use ($id_tipo_sello){
                        $join->on('products.id', '=', 'serie6000_parameters.product_id')
                            ->where('serie6000_parameters.tipo_sello_id', '=', $id_tipo_sello);
                    })
                    ->get();

                    break;
                case 3: //Serie Moto
                    $id_tipo_sello = $request->tipo_sello;

                    $productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('moto_parameters', function ($join) use ($id_tipo_sello){
                        $join->on('products.id', '=', 'moto_parameters.product_id')
                            ->where('moto_parameters.tipo_sello_id', '=', $id_tipo_sello);
                    })
                    ->paginate(15);

                    $total_productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('moto_parameters', function ($join) use ($id_tipo_sello){
                        $join->on('products.id', '=', 'moto_parameters.product_id')
                            ->where('moto_parameters.tipo_sello_id', '=', $id_tipo_sello);
                    })
                    ->get();
                    break;
                case 4: //Serie chumaceras
                    $id_tipo_brida = $request->tipo_brida;

                    $productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('chumacera_parameters', function ($join) use ($id_tipo_brida){
                        $join->on('products.id', '=', 'chumacera_parameters.product_id')
                            ->where('chumacera_parameters.tipo_chum_id', '=', $id_tipo_brida);
                    })
                    ->paginate(15);

                    $total_productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('chumacera_parameters', function ($join) use ($id_tipo_brida){
                        $join->on('products.id', '=', 'chumacera_parameters.product_id')
                            ->where('chumacera_parameters.tipo_chum_id', '=', $id_tipo_brida);
                    })
                    ->get();
                    break;
                case 5: //Serie CAdenas
                    $id_tipo_cadena = $request->tipo_cadena;

                    $productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('cadena_parameters', function ($join) use ($id_tipo_cadena){
                        $join->on('products.id', '=', 'cadena_parameters.product_id')
                            ->where('cadena_parameters.tipo_cadena_id', '=', $id_tipo_cadena);
                    })
                    ->paginate(15);

                    $total_productos = DB::table('products')
                    ->where('category_id', $category_id)
                    ->where('titulo', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->join('cadena_parameters', function ($join) use ($id_tipo_cadena){
                        $join->on('products.id', '=', 'cadena_parameters.product_id')
                            ->where('cadena_parameters.tipo_cadena_id', '=', $id_tipo_cadena);
                    })
                    ->get();
                    break;
            }
        }

        $total_products = count($total_productos);

        $categories = Category::all();
        $posicion_rueda = Posicion::all();
        $tipo_chum = Tipo_Chum::all();
        $tipo_cadena = Tipo_Cadena::all();
        $tipo_sello = Tipo_Sello::all();

        return view('vitrina', compact('productos', 'categories', 'total_products', 'categoria', 'slug', 'posicion_rueda', 'tipo_chum', 'tipo_cadena', 'tipo_sello'));

    }

    //Detalles de producto
    public function show($slug)
    {
        $producto = Product::where('slug', $slug)->first();
        return view('productDetail', compact('producto'));
    }
}
