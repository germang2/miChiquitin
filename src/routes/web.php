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
      Route::resource('Empresa','Usuarios\EmpresaController',['only'=>['edit','update']]);
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/Restore/{id}', 'Usuarios\UsuarioController@restore')->name('restore');
    Route::resource('Usuario','Usuarios\UsuarioController',['only'=> 'destroy']);
    Route::resource('Cliente','Usuarios\ClienteController',['only' => 'destroy']);
    Route::resource('Empleado','Usuarios\EmpleadoController',['except' => ['index','show']]);
//rutas de los reportes
    Route::get('/Ciudades', function(){return view('usuario.filtros.IndexFiltros');})->name('filtros');
    Route::get('/Ciudad{Ciudad}', 'Usuarios\ClienteController@ciudad')->name('ciudad');
    Route::get('/Genero{Ciudad}', 'Usuarios\ClienteController@genero')->name('genero');
    Route::get('/Acceso', 'Usuarios\UsuarioController@acceso')->name('acceso');
    Route::get('/Correo', 'Usuarios\UsuarioController@correo')->name('correo');
    Route::get('/CreditoRango', 'Usuarios\UsuarioController@credito')->name('rangocredito');
    Route::get('/CreditoRangoMax', 'Usuarios\UsuarioController@creditomax')->name('rangocreditomax');

});
Route::middleware(['auth', 'auxiliarMiddleware'])->group(function () {
  Route::resource('Contrato','Usuarios\ContratoController',['except' => ['create','store','destroy']]);
  Route::resource('Empresa','Usuarios\EmpresaController',['only'=>'index']);
  Route::resource('Usuario','Usuarios\UsuarioController',['only'=> ['edit','update']]);
  Route::resource('Cliente','Usuarios\ClienteController',['only' => ['update','edit']]);
});

Route::middleware(['auth', 'cajeroMiddleware'])->group(function () {
  Route::resource('Usuario','Usuarios\UsuarioController',['only'=> ['create','store','index','show']]);
  Route::resource('Cliente','Usuarios\ClienteController',['only' => ['create','store','index','show']]);
  Route::resource('Empleado','Usuarios\EmpleadoController',['only' => ['index','show']]);
  Route::get('/indextrash', 'Usuarios\UsuarioController@indextrash')->name('indextrash');
  Route::get('/Nombre', 'Usuarios\UsuarioController@indexname')->name('name'); 
});
Route::middleware(['auth', 'vendedorMiddleware'])->group(function () {

});
//Cartera::reoutes();
