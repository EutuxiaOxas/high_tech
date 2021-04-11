<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use  App\Blog\Article;
use  App\Blog\Category;
use  App\Blog\Keyword;

use File;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Article::all();
        return view('cms.blog.articulos')->with(compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('cms.blog.articulos.crear_articulos')->with(compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autor_id = $request->article_author;
        $image = $request->file('article_picture');

        if(auth()->user()->id == $autor_id)
        {

            $articulo = new Article;
            $articulo->title = $request->articulo_title;
            $articulo->content = $request->articulo_content;
            $articulo->date = $request->articulo_date;
            $articulo->autor_id = $autor_id;
            $articulo->category_id = $request->articulo_categoria;
            $articulo->slug = $request->slug;


            if($image){
                $imagen = $image->store('public/blog_articulos_imagen');

                //verificamos que la imagen haya sido movida y guardamos la ruta
                if($imagen){
                    $articulo->picture = $imagen;
                    $articulo->save();



                    $keywords = $request->articulo_keywords;
                    $tags = explode(",", $keywords);

                    $keywords = [];

                    foreach ($tags as $tag)
                    {
                        $verificar = Keyword::where('keyword', $tag)->first();

                        if(isset($verificar))
                        {
                            $keywords[] = $verificar->id;
                        }else {
                            $keyword = Keyword::create([
                                'keyword' => $tag,
                            ]);

                            $keywords[] = $keyword->id;
                        }
                    }

                    $articulo->keywords()->sync($keywords);
                }
            }


        } else {
            return back()->with('message', 'no se pudo crear el articulo');
        }
        $articulos = Article::all();
        return redirect()->route('cms.blog.show', compact('articulos'))->with('info', 'Artículo creado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $articulo = Article::find($id);
        $categorias = Category::all();

        return view('cms.blog.articulos.editar_articulos')->with(compact('articulo', 'categorias'));
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
        $image = $request->file('article_picture');
        $articulo = Article::find($id);

        $articulo->title = $request->articulo_title;
        $articulo->content = $request->articulo_content;
        // $articulo->keywords = $request->articulo_keywords;
        $articulo->date = $request->articulo_date;
        $articulo->category_id = $request->articulo_categoria;

        if($image){

                //verificamos que la imagen exista
                if($image){
                    $imagen = $image->store('public/blog_articulos_imagen');

                    //verificamos que la imagen haya sido movida y guardamos la ruta
                    if($imagen){
                        $articulo->picture = $imagen;
                        $articulo->save();

                        $keywords = $request->articulo_keywords;
                        $tags = explode(",", $keywords);

                        $keywords = [];

                        foreach ($tags as $tag)
                        {
                            $verificar = Keyword::where('keyword', $tag)->first();

                            if(isset($verificar))
                            {
                                $keywords[] = $verificar->id;
                            }else {
                                $keyword = Keyword::create([
                                    'keyword' => $tag,
                                ]);

                                $keywords[] = $keyword->id;
                            }
                        }

                        $articulo->keywords()->sync($keywords);
                    }

                } else {
                    return back()->with('message','No se pudo actualizar la imagen con éxito');
                }

        } else {
            $articulo->save();
        }

        $articulos = Article::all();
        return redirect()->route('cms.blog.show', compact('articulos'))->with('info', 'Artículo actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Article::find($id);

        if($articulo->picture){
            if(substr($articulo->picture, 0, 4)  === "http"){
                $deleted = true;
            } else {
                $fullpath = public_path() . '/blog_articulos_imagen/' . $articulo->picture;
                $deleted = File::delete($fullpath);
            }
        }

        if(isset($deleted) || $articulo->picture === null)
        {
            $articulo->delete();
            $articulos = Article::all();
            return redirect()->route('cms.blog.show', compact('articulos'))->with('info', 'Artículo eliminado exitosamente!');

        }
    }
}
