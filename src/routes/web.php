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
//return view('usuario.submenu');
    //return view('usuario.index');
    //return view('layouts.sidemenu');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/homeCliente', function(){return view('usuario.index');})->name('homeCliente');
Route::resource('Usuario','Usuarios\UsuarioController');
Route::resource('Cliente','Usuarios\ClienteController');//, ['middleware' => ['auth' ,'adminMiddleware']]);
Route::resource('Empleado','Usuarios\EmpleadoController');
Route::resource('Empresa','Usuarios\EmpresaController');
Route::resource('Contrato','Usuarios\ContratoController');
//Cartera::reoutes();
