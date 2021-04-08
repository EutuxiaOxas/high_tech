<?php

use Illuminate\Support\Facades\Route;
use App\Subscriber;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');
Route::get('/contacto', 'HomeController@contacto')->name('contacto');

// Vitrina total
Route::get('/products', 'ProductsPageController@index')->name('products');
// Vitrina por categoria
Route::get('/categorias/{slug}', 'ProductsPageController@showByCategory');
// Vitrina filtrada
Route::get('/products/search', 'ProductsPageController@showByFilter')->name('products.search');
// Detalles del product
Route::get('/product/{slug}', 'ProductsPageController@show')->name('product');

Route::get('/test', function(){
	return view('page_new.src.service');
});

/* ----------------------------  RUTAS DE PRUEBA PARA EL CMS -----------------------*/

Route::middleware('auth')->group(function () {

	Route::get('/cms', 'CmsController@index');

    /* ----------  RUTA CATEGORIAS PRODUCTOS CONTROLLADOR ---------*/
    Route::get('/cms/productos/categorias', 'ProductController@showCategorias');
    Route::get('/cms/editar/producto/category/{id}', 'ProductController@editarCategory');
    Route::post('/cms/actualizar/product/category/{id}', 'ProductController@actualizarCategory');

	/* ----------  RUTA PRODUCTOS CONTROLLADOR ---------*/
	Route::get('/cms/productos', 'ProductController@index');
	Route::get('/cms/crear/productos', 'ProductController@crearProducto');
	Route::post('/cms/guardar/producto', 'ProductController@guardarProducto');
	Route::get('/cms/editar/producto/{id}', 'ProductController@editarProducto');
	Route::post('/cms/actualizar/producto/{id}', 'ProductController@actualizarProducto');
	Route::delete('/cms/eliminar/producto/{id}', 'ProductController@eliminarProducto');

	/* ----------  RUTA CATEGROIAS BLOG CONTROLLADOR ---------*/
	Route::get('/cms/blog/categorias', 'Blog\CategoriesController@index');
	Route::get('/cms/blog/crear/categoria', 'Blog\CategoriesController@crearCategoria');
	Route::post('/cms/blog/guardar/categoria', 'Blog\CategoriesController@guardarCategoria');
	Route::get('/cms/blog/editar/categoria/{id}', 'Blog\CategoriesController@editarCategoria');
	Route::post('/cms/blog/actualizar/categoria/{id}', 'Blog\CategoriesController@actualizarCategoria');
	Route::delete('/cms/blog/eliminar/categoria/{id}', 'Blog\CategoriesController@eliminarCategoria');

	/* ----------  RUTA ARTICULOS BLOG CONTROLLADOR ---------*/
	Route::get('/cms/blog/articulos', 'Blog\ArticuloController@index');
	Route::get('/cms/blog/crear/articulos', 'Blog\ArticuloController@create');
	Route::post('/cms/blog/guardar/articulo', 'Blog\ArticuloController@store');
	Route::get('/cms/blog/editar/articulo/{id}', 'Blog\ArticuloController@edit');
	Route::post('/cms/blog/actualizar/articulo/{id}', 'Blog\ArticuloController@update');
	Route::delete('/cms/blog/eliminar/articulo/{id}', 'Blog\ArticuloController@destroy');
});

/*------------------------------------ END --------------------------*/

Auth::routes();

Route::get('/blog', 'BlogController@index')->name('main.blog.home');
Route::get('/blog/{slug}', 'BlogController@post')->name('main.blog.show');
Route::get('/blog-categorie/{slug}', 'BlogController@postsWithCategorie')->name('main.blog.categorie');
Route::get('/blog-tags/{keyword}', 'BlogController@postByTag')->name('main.blog.tag');



