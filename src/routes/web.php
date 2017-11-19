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


//Rutas Reportes
	Route::get('/reportes', 'Inventario\ProveedoresController@showReporte')->name('reportes');

	Route::get('/reportes/proveedores', 'Inventario\ProveedoresController@reportesProveedores')->name('reportesProveedores');
	Route::post('/reportes/proveedores/resultado', 'Inventario\ProveedoresController@reporteProveedor')->name('reporteProveedor');

	Route::get('/reportes/articulos', 'Inventario\ArticuloController@reportesArticulos')->name('reportesArticulos');
	Route::post('/reportes/articulos/resultado', 'Inventario\ArticuloController@reporteArticulo')->name('reporteArticulo');

	Route::get('/reportes/articulos/buscar', 'Inventario\ArticuloController@searchProveedor')->name('search.Proveedor');

	Route::get('/reportes/pedidos', 'Inventario\PedidosController@reportesPedidos')->name('reportesPedidos');
	Route::post('/reportes/pedidos/resultado', 'Inventario\PedidosController@reportePedido')->name('reportePedido');



// ------------------------- Rutas modulo Cartera -----------------

Route::get('/deuda/hcliente','Cartera\DeudaController@hcliente');
Route::get('/pago/hpago','Cartera\PagoController@hpago');
Route::get('/consultas/planes','Cartera\ConsultasController@planes');
Route::get('/consultas/mayor','Cartera\ConsultasController@mayor');
Route::get('/consultas/mdeudas','Cartera\ConsultasController@mdeudas');
Route::get('/deuda/mora/{id}','Cartera\DeudaController@mora');


Route::get('deuda/setCliente', 'Cartera\DeudaController@setCliente');
Route::get('/downloadPDF/{id}','Cartera\PagoController@downloadPDF');
Route::resource('deuda', 'Cartera\DeudaController');
Route::resource('pago', 'Cartera\PagoController');
Route::resource('plan_de_pago', 'Cartera\Plan_de_pagoController');
Route::resource('consultas', 'Cartera\ConsultasController');

Route::get('reportes', 'Cartera\ReportesController@index');
Route::get('reportes/reporte_deudas', 'Cartera\ReportesController@reporte_deudas');
Route::get('reportes/pagos_ultima_semana', 'Cartera\ReportesController@pagos_ultima_semana');
Route::get('reportes/pagos_ultimo_mes', 'Cartera\ReportesController@pagos_ultimo_mes');
Route::get('reportes/downloadPDF/{any?}','Cartera\ReportesController@downloadPDF');
Route::resource('deuda', 'Cartera\DeudaController');
Route::resource('plan_de_pago', 'Cartera\Plan_de_pagoController');

// ------------------ Terminan rutas de modulo cartera ---------------


//----------------------- Rutas de modulo usuarios ---------------------
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

//----------------- Terminan rutas de modulo usuarios --------------------------

//----------------- Rutas de Contabilidad ---------------------------------
Route::group(['middleware' => 'auth'], function() {

    Route::resource('nominas', 'Contabilidad\NominaCtr');
    Route::post('nominas/ajax', 'Contabilidad\NominaCtr@getNominas');
    Route::post('nominas/empleado', 'Contabilidad\NominaCtr@getEmpleados');
    Route::post('nomina/datos', 'Contabilidad\NominaCtr@getDatos');
    Route::post('nomina/get', 'Contabilidad\NominaCtr@getNomina');
    Route::post('nominas/genNom', 'Contabilidad\NominaCtr@genNom');
    Route::resource('pagoproveedores', 'Contabilidad\pagoProveedoresCtr');
    Route::post('pagos/ajax', 'Contabilidad\pagoProveedoresCtr@getPagos');
    Route::post('pagar/pedido', 'Contabilidad\pagoProveedoresCtr@pagarPedido');
    Route::post('rechazar/pedido', 'Contabilidad\pagoProveedoresCtr@rechazarPedido');
    Route::resource('balances', 'Contabilidad\balanceCtr');
    Route::resource('conta/varcontr', 'Contabilidad\VariablesController');

    Route::bind('varcontr', function($varcontr){
        return App\Models\Contabilidad\Varcontrol::find($varcontr);

    });
});
//------------------------ Terminan rutas de contabilidad ----------------------