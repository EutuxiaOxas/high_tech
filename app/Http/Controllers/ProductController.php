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
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;

use Maatwebsite\Excel\Facades\Excel;

use File;

class ProductController extends Controller
{
    private $perPage = 75;

    public function index(Request $request){

        $categories_selected = $request->categories;

        $productos = Product::paginate($this->perPage);

        if(isset($categories_selected)){
            $productos = Product::whereIn('category_id', $categories_selected)
                ->paginate($this->perPage);
        }else{
            $categories_selected = array();
        }

        $categories = Category::all();
    	return view('cms.productos.productos')->with(compact('productos', 'categories', 'categories_selected'));
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
    	$producto = new Product;
        $image    = $request->file('imagen_producto');

        $producto->titulo           = $request->titulo_producto;
    	$producto->slug             = $request->slug;
        $producto->precio           = $request->precio_producto;
        $producto->quantity         = $request->cantidad_producto;
        $producto->aplicacion       = $request->aplicacion;
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

        if($request->chumacera_info       === 'active'){
            $chumacera_parametro = new Chumacera_Parameter;
            $chumacera_parametro->create([
                'product_id'         => $producto->id,
                'diametro_chumacera' => $request['diametro_chumacera']
            ]);

        }elseif ($request->cadena_info    === 'active') {

            $cadena_parametro = new Cadena_Parameter;
            $cadena_parametro->create([
                'product_id'        => $producto->id,
                'pitch'             => $request['pitch_cadena']
            ]);

        }elseif ($request->moto_info      === 'active') {

            $moto_parametro = new Moto_Parameter;
            $moto_parametro->create([
                'product_id'        => $producto->id,
                'd_interno'         => $request['d_interno_moto'],
                'espesor'           => $request['espesor_moto'],
                'd_externo'         => $request['d_externo_moto'],
                'tipo_sello'        => $request['tipo_sello_moto']
            ]);

        }elseif ($request->serie6000_info === 'active') {
            $serie6000_parametro = new Serie6000_Parameter;
            $serie6000_parametro->create([
                'product_id'        => $producto->id,
                'tipo_sello'        => $request['tipo_sello_6000'],
                'd_interno'         => $request['d_interno_serie6000'],
                'd_externo'         => $request['d_externo_serie6000'],
                'espesor'           => $request['espesor_serie6000']
            ]);

        }elseif ($request->auto_info      === 'active') {
            $auto_parametro = new Auto_Parameter;
            $auto_parametro->create([
                'product_id'     => $producto->id,
                'posicion_rueda' => $request['posicion_rueda'],
                'd_interno'      => $request['d_interno_auto'],
                'd_externo'      => $request['d_externo_auto'],
                'espesor'        => $request['espesor_auto']
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
    	$producto->slug             = $request->slug;
        $producto->precio           = $request->precio_producto;
        $producto->quantity         = $request->cantidad_producto;
        $producto->aplicacion       = $request->aplicacion;
        $producto->codigo_universal = $request->codigo_producto;
    	$producto->category_id      = $request->categoria_producto;
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
                'product_id'         => $producto->id,
                'diametro_chumacera' => $request['diametro_chumacera']
            ]);

        }elseif ($request->cadena_info === 'active') {

            $cadena_parametro = Cadena_Parameter::find($request->cadena_info_id);
            $cadena_parametro->update([
                'product_id'        => $producto->id,
                'pitch'             => $request['pitch_cadena']
            ]);

        }elseif ($request->moto_info === 'active') {

            $moto_parametro = Moto_Parameter::find($request->moto_info_id);
            $moto_parametro->update([
                'product_id'        => $producto->id,
                'd_interno'         => $request['d_interno_moto'],
                'espesor'           => $request['espesor_moto'],
                'd_externo'         => $request['d_externo_moto'],
                'tipo_sello'        => $request['tipo_sello_moto']
            ]);

        }elseif ($request->serie6000_info === 'active') {

            $serie6000_parametro = Serie6000_Parameter::find($request->serie6000_info_id);
            $serie6000_parametro->update([
                'product_id'        => $producto->id,
                'tipo_sello'        => $request['tipo_sello_6000'],
                'd_interno'         => $request['d_interno_serie6000'],
                'd_externo'         => $request['d_externo_serie6000'],
                'espesor'           => $request['espesor_serie6000']
            ]);

        } elseif ($request->auto_info === 'active') {
            $auto_parametro = Auto_Parameter::find($request->auto_info_id);
            $auto_parametro->update([
                'product_id'     => $producto->id,
                'posicion_rueda' => $request['posicion_rueda'],
                'd_interno'      => $request['d_interno_auto'],
                'd_externo'      => $request['d_externo_auto'],
                'espesor'        => $request['espesor_auto']
            ]);
        }

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


    // Parametros de las series, usadas en el filtro
    public function parameters(){
        $posiciones = Posicion::all();
        $sellos = Tipo_Sello::all();
        $bridas = Tipo_Chum::all();
        $cadenas = Tipo_Cadena::all();

        return view('cms.productos.parameters.index')->with( compact('posiciones', 'sellos', 'bridas', 'cadenas') );
    }

    //
    public function crearParameter($serie){
        return view('cms.productos.parameters.create')->with( compact('serie') );
    }

    // Guardar parametro
    public function guardarParameter(Request $request){
        $serie = $request->serie;
        if( $serie == 'auto' ){

            $posicion_rueda = new Posicion;
            $posicion_rueda->create([
                'posicion' => $request['parameter']
            ]);

        }else if( $serie == 'chumacera' ){

            $tipo_chum = new Tipo_Chum;
            $tipo_chum->create([
                'tipo_chum' => $request['parameter']
            ]);

        }else if( $serie == 'cadena' ){

            $tipo_cadena = new Tipo_Cadena;
            $tipo_cadena->create([
                'tipo_cadena_texto' => $request['parameter'],
                'tipo_cadena_num' => 0
            ]);

        }else{

            $tipo_sello = new Tipo_Sello;
            $tipo_sello->create([
                'tipo_sello' => $request['parameter']
            ]);

        }

        return redirect()->route("cms.products.parameters.show")->with('info', 'Parametro guardado exitosamente!');

    }

    // Editar parametro
    public function editarParameter(Request $request){
        $serie = $request->serie;
        if( $serie == 'auto' ){

            $parametro = Posicion::find($request->id);

        }else if( $serie == 'chumacera' ){

            $parametro = Tipo_Chum::find($request->id);

        }else if( $serie == 'cadena' ){

            $parametro = Tipo_Cadena::find($request->id);

        }else{

            $parametro = Tipo_Sello::find($request->id);

        }

        return view('cms.productos.parameters.edit')->with( compact('serie', 'parametro') );

    }

    // update parametro
    public function actualizarParameter(Request $request){
        $serie = $request->serie;
        if( $serie == 'auto' ){

            $parametro = Posicion::find($request->id);
            $parametro->update([
                'posicion' => $request->parameter
            ]);

        }else if( $serie == 'chumacera' ){

            $parametro = Tipo_Chum::find($request->id);
            $parametro->update([
                'tipo_chum' => $request->parameter
            ]);

        }else if( $serie == 'cadena' ){

            $parametro = Tipo_Cadena::find($request->id);
            $parametro->update([
                'tipo_cadena_texto' => $request->parameter,
                'tipo_cadena_num' => 0
            ]);

        }else{

            $parametro = Tipo_Sello::find($request->id);
            $parametro->update([
                'tipo_sello' => $request->parameter
            ]);

        }

        return redirect()->route("cms.products.parameters.show")->with('info', 'Parametro actualizado exitosamente!');

    }

    // Eliminar parametro
    public function eliminarParameter(Request $request){
        $serie = $request->serie;
        if( $serie == 'auto' ){

            $parametro = Posicion::find($request->id);

        }else if( $serie == 'chumacera' ){

            $parametro = Tipo_Chum::find($request->id);

        }else if( $serie == 'cadena' ){

            $parametro = Tipo_Cadena::find($request->id);

        }else{

            $parametro = Tipo_Sello::find($request->id);

        }
        $parametro->delete();

        return redirect()->route("cms.products.parameters.show")->with('info', 'Parametro eliminado exitosamente!');

    }

    // Exportar productos en Excel
    public function exportProducts(){

        return Excel::download(new ProductsExport, 'products.xlsx');

    }

    // Importar productos en Excel
    public function importProducts(Request $request){

        $file = $request->file('file');
        Excel::import( new ProductsImport, $file );

        return back()->with('Productos Importados Exitosamente!');
        
    }
}

