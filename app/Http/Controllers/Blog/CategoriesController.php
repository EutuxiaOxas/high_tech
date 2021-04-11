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
        $image = $request->file('categoria_imagen');
        $categoria = new BlogCategory;

        $categoria->name = $request->categoria_titulo;
        $categoria->slug = $request->slug;
        $categoria->description = $request->categoria_descripcion;
        $categoria->parent_category_id = 1;

            //verificamos que la imagen exista
        if($image){
            $imagen = $image->store('public/blog_categorias_imagen');

            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($imagen){
                $categoria->picture = $imagen;
                $categoria->save();
            }

        } else {
            return back()->with('message', 'no se pudo guardar imagen');
        }

        $categorias = BlogCategory::all();
        return redirect()->route('cms.blog.categories.show', compact('categorias'))->with('info', 'Categoría creada exitosamente!');
    }

    public function editarCategoria($id)
    {
    	$categoria = BlogCategory::find($id);

    	return view('cms.blog.categorias.editar_categoria')->with(compact('categoria'));
    }

    public function actualizarCategoria(Request $request, $id)
    {
    	$categoria = BlogCategory::find($id);
    	$image = $request->file('categoria_imagen');

    	$categoria->name = $request->categoria_titulo;
    	$categoria->description = $request->categoria_descripcion;
        $categoria->slug = $request->slug;
    	$categoria->parent_category_id = 1;

    	if($image){

            $imagen = $image->store('public/blog_categorias_imagen');
            //verificamos que la imagen haya sido movida y guardamos la ruta
            if($imagen){
                $categoria->picture = $imagen;
                $categoria->save();
            }

        } else {
            $categoria->save();

        }
        $categorias = BlogCategory::all();
        return redirect()->route('cms.blog.categories.show', compact('categorias'))->with('info', 'Categoría actualizada exitosamente!');
    }

    public function eliminarCategoria($id)
    {
    	$categoria = BlogCategory::find($id);

        $categoria->delete();
        $categorias = BlogCategory::all();
        return redirect()->route('cms.blog.categories.show', compact('categorias'))->with('info', 'Categoría eliminada exitosamente!');

    }
}
