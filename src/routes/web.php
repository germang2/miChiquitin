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

Route::middleware(['auth', 'rootMiddleware'])->group(function () {
  Route::resource('Usuario','Usuarios\UsuarioController',['except' => ['create','store','update']]);
  Route::resource('Cliente','Usuarios\ClienteController');
  Route::resource('Empleado','Usuarios\EmpleadoController');
  Route::resource('Empresa','Usuarios\EmpresaController',['except' => ['create','store','show','destroy']]);
  Route::resource('Contrato','Usuarios\ContratoController',['except' => ['create','store','destroy']]);
    });

Route::get('/homeCliente', function(){return view('usuario.index');})->name('homeCliente');
Route::get('/Ciudades', function(){return view('usuario.filtros.IndexFiltros');})->name('filtros');
Route::get('/Ciudad{Ciudad}', 'Usuarios\ClienteController@ciudad')->name('ciudad');
Route::get('/indexCiudades', 'Usuarios\ClienteController@ciudades')->name('ciudades');
Route::get('/Genero{Ciudad}', 'Usuarios\ClienteController@genero')->name('genero');
Route::get('/Nombre', 'Usuarios\UsuarioController@name')->name('name');
Route::get('/Acceso', 'Usuarios\UsuarioController@acceso')->name('acceso');
//Cartera::reoutes();
