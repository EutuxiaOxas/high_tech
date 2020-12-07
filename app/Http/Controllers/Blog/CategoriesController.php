<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Blog\Category as BlogCategory;
use File;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categorias = BlogCategory::all();
    	return view('cms.blog.categorias')->with(compact('categorias'));
    }

    public function crearCategoria()
    {
    	return view('cms.blog.categorias.crear_categoria');
    }

    public function guardarCategoria(Request $request)
    {
    	    $file = $request->file('categoria_imagen');
    		$categoria = new BlogCategory;

    		$categoria->name = $request->categoria_titulo;
    		$categoria->description = $request->categoria_descripcion;
    		$categoria->parent_category_id = 1;

    	     //verificamos que la imagen exista
    	    if($file){
    	        $path = public_path() . '/blog_categorias_imagen';
    	        $fileName = uniqid() . $file->getClientOriginalName();
    	        $moved = $file->move($path, $fileName);

    	        //verificamos que la imagen haya sido movida y guardamos la ruta
    	        if($moved){
    	            $categoria->picture = $fileName;
    	            $categoria->save();

    	            return back()->with('message', 'Categoria creada con éxito');
    	        }

    	    } else {
    	        return back()->with('message', 'no se pudo guardar imagen');
    	    }
    }

    public function editarCategoria($id)
    {
    	$categoria = BlogCategory::find($id);

    	return view('cms.blog.categorias.editar_categoria')->with(compact('categoria'));
    }

    public function actualizarCategoria(Request $request, $id)
    {
    	$categoria = BlogCategory::find($id);
    	$file = $request->file('categoria_imagen');

    	$categoria->name = $request->categoria_titulo;
    	$categoria->description = $request->categoria_descripcion;
    	$categoria->parent_category_id = 1;

    	if($file){

            if($categoria->picture){
                if(substr($categoria->picture, 0, 4)  === "http"){
                    $deleted = true;
                } else {
                    $fullpath = public_path() . '/blog_categorias_imagen/' . $categoria->picture;
                    $deleted = File::delete($fullpath);
                }
            }
            
            //verificacion de que se haya eliminado la imagen o que no exista el en el campo
            if(isset($deleted) || $categoria->picture === null){

                //verificamos que la imagen exista
                if($file){
                    $path = public_path() . '/blog_categorias_imagen';
                    $fileName = uniqid() . $file->getClientOriginalName();
                    $moved = $file->move($path, $fileName);
            
                    //verificamos que la imagen haya sido movida y guardamos la ruta
                    if($moved){
                        $categoria->picture = $fileName;
                        $categoria->save();
                    }

                    // return back();
                } else {
                    return back()->with('message','No se pudo actualizar la imagen con éxito');
                }
            }
        } else {
            $categoria->save();
            
        }

        return back()->with('message', 'Categoria actualizada correctamente');
    }

    public function eliminarCategoria($id)
    {
    	$categoria = BlogCategory::find($id);

    	if($categoria->picture){
    	    if(substr($categoria->picture, 0, 4)  === "http"){
    	        $deleted = true;
    	    } else {
    	        $fullpath = public_path() . '/blog_categorias_imagen/' . $categoria->picture;
    	        $deleted = File::delete($fullpath);
    	    }
    	}

    	if(isset($deleted) || $categoria->picture === null)
    	{
    		$categoria->delete();
    		return back()->with('message', 'Categoria eliminada correctamente');
    	}
    }
}
