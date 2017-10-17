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

//Facturación 
Route::get('/test/{id_producto}', 'Facturacion\ValorProducto@valor');
Route::get('/test/{id_producto}/{cantidad}', 'Facturacion\CompraProducto@compra');


//Cartera::reoutes();
