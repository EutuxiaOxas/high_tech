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

            // Veridfico si hay imagen en BD, y la elimino
            if($category->imagen){
                if(substr($category->imagen, 0, 4)  === "http"){
                    $deleted = true;
                } else {
                    $fullpath = public_path() . '/imagenes/series_logos/' . $category->imagen;
                    $deleted = File::delete($fullpath);
                }
            }

            //verificacion de que se haya eliminado la imagen o que no exista el en el campo
            if(isset($deleted) || $category->imagen === null){

                //verificamos que la imagen exista
                if($imagen){
                    $path = public_path() . '/imagenes/series_logos';
                    $fileName = uniqid() . $imagen->getClientOriginalName();
                    $moved = $imagen->move($path, $fileName);

                    //verificamos que la imagen haya sido movida y guardamos la ruta
                    if($moved){
                        $category->imagen = $fileName;
                        $category->save();
                    }

                    // return back();
                } else {
                    return back()->with('message','No se pudo actualizar la imagen con éxito');
                }
            }
        } else {
            $category->save();
        }

        // Verifico el pdf
        if($pdf_catalogo){

            // Veridfico si hay imagen en BD, y la elimino
            if($category->pdf){
                if(substr($category->pdf, 0, 4)  === "http"){
                    $deleted = true;
                } else {
                    $fullpath = public_path() . '/pdfs/' . $category->pdf;
                    $deleted = File::delete($fullpath);
                }
            }

            //verificacion de que se haya eliminado la imagen o que no exista el en el campo
            if(isset($deleted) || $category->pdf === null){

                //verificamos que la imagen exista
                if($pdf_catalogo){
                    $path = public_path() . '/pdfs';
                    $fileName = uniqid() . $pdf_catalogo->getClientOriginalName();
                    $moved = $pdf_catalogo->move($path, $fileName);

                    //verificamos que la imagen haya sido movida y guardamos la ruta
                    if($moved){
                        $category->pdf = $fileName;
                        $category->save();
                    }

                    // return back();
                } else {
                    return back()->with('message','No se pudo actualizar la imagen con éxito');
                }
            }
        } else {
            $category->save();
        }

        $categorias = Category::all();
    	return view('cms.productos.categorias.index')->with(compact('categorias'));
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
        $file = $request->file('imagen_producto');
    	$producto = new Product;
        $producto->titulo           = $request->titulo_producto;
    	$producto->slug             = $request->slug;
        $producto->precio           = $request->precio_producto;
        $producto->codigo_universal = $request->codigo_producto;
    	$producto->category_id      = $request->categoria_producto;
    	$producto->descripcion      = $request->descripcion_producto;

         //verificamos que la imagen exista
        if($file){
            $path = public_path() . '/productos_imagen';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($moved){
                $producto->imagen = $fileName;
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


        return back()->with('message', 'Producto y Parametro Guardado');

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
        $file = $request->file('imagen_producto');
        $producto = Product::find($id);

        $producto->titulo           = $request->titulo_producto;
        $producto->precio           = $request->precio_producto;
        $producto->codigo_universal = $request->codigo_producto;
        $producto->category_id      = $request->categoria_producto;
        $producto->slug             = $request->slug;
        $producto->descripcion      = $request->descripcion_producto;

        if($file){

            if($producto->imagen){
                if(substr($producto->imagen, 0, 4)  === "http"){
                    $deleted = true;
                } else {
                    $fullpath = public_path() . '/productos_imagen/' . $producto->imagen;
                    $deleted = File::delete($fullpath);
                }
            }

            //verificacion de que se haya eliminado la imagen o que no exista el en el campo
            if(isset($deleted) || $producto->imagen === null){

                //verificamos que la imagen exista
                if($file){
                    $path = public_path() . '/productos_imagen';
                    $fileName = uniqid() . $file->getClientOriginalName();
                    $moved = $file->move($path, $fileName);

                    //verificamos que la imagen haya sido movida y guardamos la ruta
                    if($moved){
                        $producto->imagen = $fileName;
                        $producto->save();
                    }

                    // return back();
                } else {
                    return back()->with('message','No se pudo actualizar la imagen con éxito');
                }
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
    	return view('cms.productos.productos')->with(compact('productos'));


    }


    public function eliminarProducto(Request $request, $id){
        $producto = Product::find($id);
        $categoria = $producto->categoria->category;


        if($producto->imagen){
            if(substr($producto->imagen, 0, 4)  === "http"){
                $deleted = true;
            } else {
                $fullpath = public_path() . '/productos_imagen/' . $producto->imagen;
                $deleted = File::delete($fullpath);
            }
        }
        if($deleted || $producto->imagen === null){
            $producto->delete();
            return back()->with('message','Eliminado con éxito');
        } else {
            return back()->with('message','No se pudo eliminar el servicio');
        }

    }
}
