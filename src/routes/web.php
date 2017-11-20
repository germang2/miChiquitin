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
    Route::post('pagar/nomina', 'Contabilidad\NominaCtr@pagarNom');
    Route::post('rechazar/pedido', 'Contabilidad\pagoProveedoresCtr@rechazarPedido');
    Route::resource('balances', 'Contabilidad\balanceCtr');
    Route::get('reporte_balances', function () {
        return view('Contabilidad.indexbalance');
    })->name('r_balance');
    Route::resource('conta/varcontr', 'Contabilidad\VariablesController');
    Route::resource('cont/permisos', 'Contabilidad\permisosController');
    Route::post('permisos/del', 'Contabilidad\permisosController@delPer');
    Route::post('permisos/add', 'Contabilidad\permisosController@addPer');
    Route::bind('varcontr', function($varcontr){
        return App\Models\Contabilidad\Varcontrol::find($varcontr);

    });
});