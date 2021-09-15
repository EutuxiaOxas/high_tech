<?php

use Illuminate\Support\Facades\Route;
use App\Subscriber;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');
Route::get('/contacto', 'HomeController@contacto')->name('contacto');

// Vitrina total
Route::get('/products', 'ProductsPageController@index')->name('products');
// Vitrina total
Route::get('/products/search', 'ProductsPageController@showSearch')->name('products.search');
// Vitrina por categoria
Route::get('/categorias/{slug}', 'ProductsPageController@showByCategory')->name('products.category');
// Vitrina filtrada
Route::get('/products/search/filters', 'ProductsPageController@showByFilter')->name('products.search.filter');
// Detalles del product
Route::get('/product/{slug}', 'ProductsPageController@show')->name('product');

// Carrito de compras
Route::get('/carrito', 'HomeController@cart')->name('cart');

/* ----------------------------  RUTAS DE PRUEBA PARA EL CMS -----------------------*/

Route::middleware('auth')->group(function () {

	// Route::get('/cms', 'CmsController@index')->name('cms.index');
	Route::get('/cms', 'CmsController@index')->middleware('can:cms.index')->name('cms.index');

    // Roles
    Route::get('/cms/get/roles', 'Admin\RoleController@index')->middleware('can:cms.users.show')->name('cms.role.index');
    Route::get('/cms/create/role', 'Admin\RoleController@create')->middleware('can:cms.users.show')->name('cms.role.create');
    Route::post('/cms/store/role', 'Admin\RoleController@store')->middleware('can:cms.users.show')->name('cms.role.store');
    Route::get('/cms/edit/role/{id}', 'Admin\RoleController@edit')->middleware('can:cms.users.show')->name('cms.role.edit');
    Route::post('/cms/update/role/{id}', 'Admin\RoleController@update')->middleware('can:cms.users.show')->name('cms.role.update');
    Route::post('/cms/destroy/role/{id}', 'Admin\RoleController@destroy')->middleware('can:cms.users.show')->name('cms.role.destroy');

    /* ----------  RUTA USUARIOS ---------*/
	Route::get('/cms/users', 'Admin\UserController@index')->middleware('can:cms.users.show')->name('cms.users.show');
	Route::get('/cms/users/user', 'Admin\UserController@create')->middleware('can:cms.users.create')->name('cms.users.create');

    /* ----------  RUTA CATEGORIAS PRODUCTOS CONTROLLADOR ---------*/
    Route::get('/cms/productos/categorias', 'ProductController@showCategorias')->middleware('can:cms.products.categories.show')->name('cms.products.categories.show');
    Route::get('/cms/editar/producto/category/{id}', 'ProductController@editarCategory')->middleware('can:cms.products.categories.edit')->name('cms.products.categories.edit');
    Route::post('/cms/actualizar/product/category/{id}', 'ProductController@actualizarCategory')->middleware('can:cms.products.categories.update')->name('cms.products.categories.update');

	/* ----------  RUTA PRODUCTOS CONTROLLADOR ---------*/
	Route::get('/cms/productos', 'ProductController@index')->middleware('can:cms.products.show')->name('cms.products.show');
	Route::get('/cms/crear/productos', 'ProductController@crearProducto')->middleware('can:cms.products.create')->name('cms.products.create');
	Route::post('/cms/guardar/producto', 'ProductController@guardarProducto')->middleware('can:cms.products.store')->name('cms.products.store');
	Route::get('/cms/editar/producto/{id}', 'ProductController@editarProducto')->middleware('can:cms.products.edit')->name('cms.products.edit');
	Route::post('/cms/actualizar/producto/{id}', 'ProductController@actualizarProducto')->middleware('can:cms.products.update')->name('cms.products.update');
	Route::delete('/cms/eliminar/producto/{id}', 'ProductController@eliminarProducto')->middleware('can:cms.products.destroy')->name('cms.products.destroy');

    /* ----------  RUTA PARAMETROS DE FILTRO ---------*/
	Route::get('/cms/parameters', 'ProductController@parameters')->middleware('can:cms.products.parameters.show')->name('cms.products.parameters.show');
	Route::get('/cms/parameters/crear/{serie}', 'ProductController@crearParameter')->middleware('can:cms.products.parameters.create')->name('cms.products.parameters.create');
	Route::post('/cms/parameters/guardar', 'ProductController@guardarParameter')->middleware('can:cms.products.parameters.store')->name('cms.products.parameters.store');
	Route::get('/cms/parameters/editar/{id}/{serie}', 'ProductController@editarParameter')->middleware('can:cms.products.parameters.edit')->name('cms.products.parameters.edit');
	Route::post('/cms/parameters/actualizar/{id}', 'ProductController@actualizarParameter')->middleware('can:cms.products.parameters.update')->name('cms.products.parameters.update');
	Route::delete('/cms/parameters/eliminar/{id}', 'ProductController@eliminarParameter')->middleware('can:cms.products.parameters.destroy')->name('cms.products.parameters.destroy');

	/* ----------  RUTA CATEGROIAS BLOG CONTROLLADOR ---------*/
	Route::get('/cms/blog/categorias', 'Blog\CategoriesController@index')->middleware('can:cms.blog.categories.show')->name('cms.blog.categories.show');
	Route::get('/cms/blog/crear/categoria', 'Blog\CategoriesController@crearCategoria')->middleware('can:cms.blog.categories.create')->name('cms.blog.categories.create');
	Route::post('/cms/blog/guardar/categoria', 'Blog\CategoriesController@guardarCategoria')->middleware('can:cms.blog.categories.store')->name('cms.blog.categories.store');
	Route::get('/cms/blog/editar/categoria/{id}', 'Blog\CategoriesController@editarCategoria')->middleware('can:cms.blog.categories.edit')->name('cms.blog.categories.edit');
	Route::post('/cms/blog/actualizar/categoria/{id}', 'Blog\CategoriesController@actualizarCategoria')->middleware('can:cms.blog.categories.update')->name('cms.blog.categories.update');
	Route::delete('/cms/blog/eliminar/categoria/{id}', 'Blog\CategoriesController@eliminarCategoria')->middleware('can:cms.blog.categories.destroy')->name('cms.blog.categories.destroy');

	/* ----------  RUTA ARTICULOS BLOG CONTROLLADOR ---------*/
	Route::get('/cms/blog/articulos', 'Blog\ArticuloController@index')->middleware('can:cms.blog.show')->name('cms.blog.show');
	Route::get('/cms/blog/crear/articulos', 'Blog\ArticuloController@create')->middleware('can:cms.blog.create')->name('cms.blog.create');
	Route::post('/cms/blog/guardar/articulo', 'Blog\ArticuloController@store')->middleware('can:cms.blog.store')->name('cms.blog.store');
	Route::get('/cms/blog/editar/articulo/{id}', 'Blog\ArticuloController@edit')->middleware('can:cms.blog.edit')->name('cms.blog.edit');
	Route::post('/cms/blog/actualizar/articulo/{id}', 'Blog\ArticuloController@update')->middleware('can:cms.blog.update')->name('cms.blog.update');
	Route::delete('/cms/blog/eliminar/articulo/{id}', 'Blog\ArticuloController@destroy')->middleware('can:cms.blog.destroy')->name('cms.blog.destroy');

    // Apis
    Route::get('/cms/get/user/{id}', 'Admin\UserController@getUserById')->middleware('can:cms.users.show');
    Route::post('/cms/password/user/{id}', 'Admin\UserController@updatePassword')->middleware('can:cms.users.update');
    Route::post('/cms/update/user/{id}', 'Admin\UserController@update')->middleware('can:cms.users.update');
    Route::post('/cms/eliminar/user/{id}', 'Admin\UserController@destroy')->middleware('can:cms.users.destroy');

});

/*------------------------------------ END --------------------------*/

Auth::routes();

Route::get('/blog', 'BlogController@index')->name('main.blog.home');
Route::get('/blog/{slug}', 'BlogController@post')->name('main.blog.show');
Route::get('/blog-categories/{slug}', 'BlogController@postsWithCategorie')->name('main.blog.categorie');
Route::get('/blog-tags/{keyword}', 'BlogController@postByTag')->name('main.blog.tag');








