<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Diametro_chum;
use App\Tipo_Chum;
use App\Forma_chum;
use App\Tipo_Cadena;
use App\Tipo_Empates;
use App\Tipo_Sello;
use App\Posicion;

//Parametros
use App\Chumacera_Parameter;
use App\Cadena_Parameter;
use App\Auto_Parameter;
use App\Moto_Parameter;
use App\Serie6000_Parameter;

use File;

class ProductController extends Controller
{
    public function index(){
        $productos = Product::all();
    	return view('cms.productos.productos')->with(compact('productos'));
    }

    public function showCategorias(){
        $categorias = Category::all();
    	return view('cms.productos.categorias.index')->with(compact('categorias'));
    }

    public function editarCategory(Request $request, $id){
        $category = Category::find($id);

        return view('cms.productos.categorias.edit_category', compact('category'));
    }

    public function actualizarCategory(Request $request, $id){
        $imagen = $request->file('imagen');
        $pdf_catalogo = $request->file('catalogo_pdf');

        $category = Category::find($id);

        $category->description = $request->description;

        // Verifico la imagen
        if($imagen){
            // Almaceno la imagen en la carpeta category_image en la carpeta storage
            $img = $imagen->store('public/category_images');

            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($img){
                $category->imagen = $img;
                $category->save();
            }

        } else {
            $category->save();
        }

        // Verifico el pdf
        if($pdf_catalogo){
            // Almaceno el pdf en la carpeta 'pdfs' dentro de storage/public, se creara la carpeta, en caso de no existir
            $pdf = $pdf_catalogo->store('public/pdfs');

            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($pdf){
                $category->pdf = $pdf;
                $category->save();
            }
        } else {
            $category->save();
        }

        $categorias = Category::all();
        return redirect()->route('cms.products.categories.show', compact('categorias'))->with('info', 'La categoría se actualizó exitosamente!');
    }

    public function crearProducto(){
        //parametros de chumacera
        $diametros_chum = Diametro_chum::all();
        $tipos_chum = Tipo_Chum::all();
        $formas_chum= Forma_chum::all();

        //parametros de cadenas
        $tipos_cadenas = Tipo_Cadena::all();
        $tipos_empates = Tipo_Empates::all();

        //moto y serie600 parametros
        $tipo_sellos = Tipo_Sello::all();

        //auto parametro
        $posiciones = Posicion::all();

    	$categorias = Category::all();
    	return view('cms.productos.crear_producto')->with(compact(
            'categorias',
            'diametros_chum',
            'tipos_chum',
            'formas_chum',
            'tipos_cadenas',
            'tipos_empates',
            'tipo_sellos',
            'posiciones'
        ));
    }


    public function guardarProducto(Request $request){
        $image = $request->file('imagen_producto');
    	$producto = new Product;
        $producto->titulo           = $request->titulo_producto;
    	$producto->slug             = $request->slug;
        $producto->precio           = $request->precio_producto;
        $producto->codigo_universal = $request->codigo_producto;
    	$producto->category_id      = $request->categoria_producto;
    	$producto->descripcion      = $request->descripcion_producto;

         //verificamos que la imagen exista
        if($image){
            $imagen = $image->store('public/products_images');

            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($imagen){
                $producto->imagen = $imagen;
                $producto->save();
            }

        } else {
            return back()->with('message', 'no se pudo guardar imagen');
        }


        if($request->chumacera_info === 'active'){

            $chumacera_parametro = new Chumacera_Parameter;
            $chumacera_parametro->create([
                'product_id' => $producto->id,
                'diametro_chum_id' => $request['diametro_chumacera'],
                'tipo_chum_id' => $request['tipo_chumacera'],
                'forma_chum_id' => $request['forma_chumacera'],
                'No_huecos' => $request['huecos_chumacera'],
            ]);

        }elseif ($request->cadena_info === 'active') {

            $cadena_parametro = new Cadena_Parameter;
            $cadena_parametro->create([
                'product_id'        => $producto->id,
                'pitch'             => $request['pitch_cadena'],
                'tipo_cadena_id'    => $request['tipo_cadena'],
                'empate_id'         => $request['empate_cadena']
            ]);

        }elseif ($request->moto_info === 'active') {


            $moto_parametro = new Moto_Parameter;
            $moto_parametro->create([
                'product_id'        => $producto->id,
                'd_interno'         =>  $request['d_interno_moto'],
                'espesor'           => $request['espesor_moto'],
                'd_externo'         => $request['d_externo_moto'],
                'tipo_sello_id'     =>$request['sello_moto']
            ]);

        }elseif ($request->serie6000_info === 'active') {

            $serie6000_parametro = new Serie6000_Parameter;
            $serie6000_parametro->create([
                    'product_id'        => $producto->id,
                    'rodamiento'        => $request['rodamiento_serie6000'],
                    'tipo_sello_id'     => $request['sello_serie6000'],
                    'd_interno'         => $request['d_interno_serie6000'],
                    'd_externo'         => $request['d_externo_serie6000'],
                    'espesor'           => $request['espesor_serie6000']
                ]);

        } elseif ($request->auto_info === 'active') {

            $auto_parametro = new Auto_Parameter;
            $auto_parametro->create([
                'product_id' => $producto->id,
                'articulo' => $request['articulo_auto'],
                'aplicacion' => $request['aplicacion_auto'],
                'posicion_id' => $request['posicion_auto'],
                'd_interno' => $request['d_interno_auto'],
                'd_externo' => $request['d_externo_auto'],
                'espesor' => $request['espesor_auto']
            ]);
        }

        $productos = Product::all();

        return redirect()->route('cms.products.show', compact('productos'))->with('info', 'Producto creado exitosamente!');

    }

    public function editarProducto(Request $request, $id){
        $producto = Product::find($id);


        //parametros chumacera
        $diametros_chum = Diametro_chum::all();
        $tipos_chum = Tipo_Chum::all();
        $formas_chum= Forma_chum::all();

        //parametros de cadenas
        $tipos_cadenas = Tipo_Cadena::all();
        $tipos_empates = Tipo_Empates::all();

        //moto y serie600 parametros
        $tipo_sellos = Tipo_Sello::all();

        //auto parametro
        $posiciones = Posicion::all();

        $categorias = Category::all();
        return view('cms.productos.editar_producto')->with(compact(
            'producto',
            'categorias',
            'diametros_chum',
            'tipos_chum',
            'formas_chum',
            'tipos_cadenas',
            'tipos_empates',
            'tipo_sellos',
            'posiciones'
        ));
    }

    public function actualizarProducto(Request $request, $id){
        $image = $request->file('imagen_producto');
        $producto = Product::find($id);

        $producto->titulo           = $request->titulo_producto;
        $producto->precio           = $request->precio_producto;
        $producto->codigo_universal = $request->codigo_producto;
        $producto->category_id      = $request->categoria_producto;
        $producto->slug             = $request->slug;
        $producto->descripcion      = $request->descripcion_producto;

        if($image){
            $imagen = $image->store('public/products_images');

            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($imagen){
                $producto->imagen = $imagen;
                $producto->save();
            }

        } else {
            $producto->save();
        }

        if($request->chumacera_info === 'active'){

            $chumacera_parametro = Chumacera_Parameter::find($request->chumacera_info_id);
            $chumacera_parametro->update([
                'product_id' => $producto->id,
                'diametro_chum_id' => $request['diametro_chumacera'],
                'tipo_chum_id' => $request['tipo_chumacera'],
                'forma_chum_id' => $request['forma_chumacera'],
                'No_huecos' => $request['huecos_chumacera'],
            ]);

        }elseif ($request->cadena_info === 'active') {

            $cadena_parametro = Cadena_Parameter::find($request->cadena_info_id);
            $cadena_parametro->update([
                'product_id'        => $producto->id,
                'pitch'             => $request['pitch_cadena'],
                'tipo_cadena_id'    => $request['tipo_cadena'],
                'empate_id'         => $request['empate_cadena']
            ]);

        }elseif ($request->moto_info === 'active') {


            $moto_parametro = Moto_Parameter::find($request->moto_info_id);
            $moto_parametro->update([
                'product_id'        => $producto->id,
                'd_interno'         =>  $request['d_interno_moto'],
                'espesor'           => $request['espesor_moto'],
                'd_externo'         => $request['d_externo_moto'],
                'tipo_sello_id'     =>$request['sello_moto']
            ]);

        }elseif ($request->serie6000_info === 'active') {

            $serie6000_parametro = Serie6000_Parameter::find($request->serie6000_info_id);
            $serie6000_parametro->update([
                    'product_id'        => $producto->id,
                    'rodamiento'        => $request['rodamiento_serie6000'],
                    'tipo_sello_id'     => $request['sello_serie6000'],
                    'd_interno'         => $request['d_interno_serie6000'],
                    'd_externo'         => $request['d_externo_serie6000'],
                    'espesor'           => $request['espesor_serie6000']
                ]);

        } elseif ($request->auto_info === 'active') {
            $auto_parametro = Auto_Parameter::find($request->auto_info_id);
            $auto_parametro->update([
                'product_id' => $producto->id,
                'articulo' => $request['articulo_auto'],
                'aplicacion' => $request['aplicacion_auto'],
                'posicion_id' => $request['posicion_auto'],
                'd_interno' => $request['d_interno_auto'],
                'd_externo' => $request['d_externo_auto'],
                'espesor' => $request['espesor_auto']
            ]);
        }

        $productos = Product::all();
        $productos = Product::all();

        return redirect()->route('cms.products.show', compact('productos'))->with('info', 'Producto editado exitosamente!');

    }


    public function eliminarProducto(Request $request, $id){
        $productos = Product::all();

        $producto = Product::find($id);
        $categoria = $producto->categoria->category;

        $producto->delete();
        return redirect()->route('cms.products.show', compact('productos'))->with('info', 'Producto eliminado exitosamente!');
    }
}
