<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
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
        }else {
            $productos = Product::paginate(15);
        }

        $all_products = Product::all();

        $other_products = [];

        $contador = 0;

        foreach ($all_products as $all_product) {
            $verificador = true;

            foreach ($productos as $producto) {

                if($producto->id == $all_product->id)
                {
                    $verificador = false;
                }
             }

             if($verificador)
             {
                $other_products[] = $all_product;
             }

            $contador ++;

            if($contador > 4)
            {
                break;
            }

        }


        return view('vitrina', compact('productos', 'other_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show($slug)
    {
        $producto = Product::where('slug', $slug)->first();
        return view('productDetail', compact('producto'));
    }



    public function showByCategory($slug)
    {
        $categoria = Category::where('slug', $slug)->first();



        if( $categoria->products ){

            $productos = $categoria->products()->paginate(15);

            $all_products = Product::all();

            $other_products = [];

            $contador = 0;

            foreach ($all_products as $all_product) {
                $verificador = true;

                foreach ($productos as $producto) {

                    if($producto->id == $all_product->id)
                    {
                        $verificador = false;
                    }
                 }

                 if($verificador)
                 {
                    $other_products[] = $all_product;
                 }

                $contador ++;

                if($contador > 4)
                {
                    break;
                }

            }
        }else{
            $productos = [];
        }

        return view('vitrina', compact('productos', 'other_products', 'slug'));

    }
}
