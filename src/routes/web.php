<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Cartera::reoutes();

//--------------------------------------RUTAS INVENTARIO-----------------------------
//RUTAS PROVEEDORES
Route::get('/proveedores', 'Inventario\ProveedoresController@proveedores')->name('proveedores');

//funcion es el que va despues del @
	Route::get('/proveedores/eliminar', 'Inventario\ProveedoresController@eliminar')->name('eliminar');

	//elimiar post lo devuelve a proveedores
	Route::post('/proveedores/eliminar', 'Inventario\ProveedoresController@update')->name('eliminar_post');

	Route::get('/proveedores/actualizar', 'Inventario\ProveedoresController@actualizar')->name('actualizar');

	Route::get('/proveedores/actualizar/actualizar_form', 'Inventario\ProveedoresController@actualizar_form')->name('actualizar_form');

	Route::post('/proveedores/actualizar/actualizar_form', 'Inventario\ProveedoresController@update_actualizar')->name('actualizar_post');

	Route::get('/proveedores/agregar', 'Inventario\ProveedoresController@agregar')->name('agregar');

	Route::post('/proveedores/agregar/agregar_form', 'Inventario\ProveedoresController@agregarProveedor')->name('agregarForm');


//RUTAS ARTICULOS

	Route::get('/articulos', 'Inventario\ArticuloController@index')->name('articulos');

	Route::get('/articulos/agregar/search', 'Inventario\ArticuloController@search')->name('platform.search');

	Route::get('/articulos/agregar', 'Inventario\ArticuloController@create')->name('agregarArticulo');
	Route::post('/articulos/agregar', 'Inventario\ArticuloController@store')->name('storeArticulo');

	Route::get('/articulos/eliminar', 'Inventario\ArticuloController@delete')->name('eliminarArticulo');
	Route::post('/articulos/eliminar', 'Inventario\ArticuloController@destroy')->name('destroyArticulo');
	
	Route::get('/articulos/actualizar', 'Inventario\ArticuloController@edit')->name('actualizarArticulo');
	Route::post('/articulos/actualizar', 'Inventario\ArticuloController@update')->name('updateArticulo');


//RUTAS PEDIDOS

	Route::get('/pedidos', 'Inventario\PedidosController@index')->name('pedidos');

	Route::get('/pedidos/agregar', 'Inventario\PedidosController@show')->name('showPedido');
	Route::get('/pedidos/agregar/nuevo', 'Inventario\PedidosController@create')->name('createPedido');
	Route::get('/pedidos/agregar/nuevo/articulo', 'Inventario\PedidosController@showArticulo')->name('showArticuloPedido');
	Route::post('/pedidos/agregar/nuevo/articulo', 'Inventario\PedidosController@store')->name('storePedido');

	Route::get('/pedidos/eliminar', 'Inventario\PedidosController@delete')->name('eliminarPedido');
	Route::post('/pedidos/eliminar', 'Inventario\PedidosController@destroy')->name('destroyPedido');

	Route::get('/pedidos/actualizar', 'Inventario\PedidosController@edit')->name('actualizarPedido');
	Route::post('/pedidos/actualizar', 'Inventario\PedidosController@update')->name('updatePedido');



//------------------------------RUTAS INVENTARIO----------------------------------