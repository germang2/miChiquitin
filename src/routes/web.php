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
    Route::resource('conta/varcontr', 'Contabilidad\VariablesController');

    Route::bind('varcontr', function($varcontr){
        return App\Models\Contabilidad\Varcontrol::find($varcontr);

    });
});

//Cartera::reoutes();
