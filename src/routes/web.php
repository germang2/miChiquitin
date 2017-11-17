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
      Route::resource('Usuario','Usuarios\UsuarioController',['only' => 'destroy']);
      Route::resource('Empleado','Usuarios\EmpleadoController',['only' => 'destroy']);
      Route::resource('Empresa','Usuarios\EmpresaController',['only'=>['edit','update']]);
      Route::get('/Restore/{id}', 'Usuarios\UsuarioController@restore')->name('restore');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::resource('Usuario','Usuarios\UsuarioController',['only'=> 'edit']);
    Route::resource('Cliente','Usuarios\ClienteController',['only' => ['destroy','create','store','update','edit']]);
    Route::resource('Empleado','Usuarios\EmpleadoController',['except' => ['destroy','index','show']]);
    Route::resource('Contrato','Usuarios\ContratoController',['except' => ['create','store','destroy']]);
//rutas de los reportes
    Route::get('/Ciudades', function(){return view('usuario.filtros.IndexFiltros');})->name('filtros');
    Route::get('/Ciudad{Ciudad}', 'Usuarios\ClienteController@ciudad')->name('ciudad');
    Route::get('/indexCiudades', 'Usuarios\ClienteController@ciudades')->name('ciudades');
    Route::get('/Genero{Ciudad}', 'Usuarios\ClienteController@genero')->name('genero');
    Route::get('/Nombre', 'Usuarios\UsuarioController@name')->name('name');
    Route::get('/Acceso', 'Usuarios\UsuarioController@acceso')->name('acceso');
});
Route::middleware(['auth', 'empleadoMiddleware'])->group(function () {
  Route::resource('Usuario','Usuarios\UsuarioController',['only'=> ['index','show']]);
  Route::resource('Cliente','Usuarios\ClienteController',['only' => ['index','show']]);
  Route::resource('Empleado','Usuarios\EmpleadoController',['only' => ['index','show']]);
  Route::resource('Empresa','Usuarios\EmpresaController',['only'=>'index']);
  Route::get('/indextrash', 'Usuarios\UsuarioController@indextrash')->name('indextrash');

});
Route::get('/homeCliente', function(){return view('usuario.index');})->name('homeCliente'); //esta ruta no esta en uso por ahora
//Cartera::reoutes();
