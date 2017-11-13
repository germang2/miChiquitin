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

Route::get('deuda/setCliente', 'cartera\DeudaController@setCliente');
Route::get('reportes', 'cartera\ReportesController@index');

Route::get('reportes/reporte_deudas', 'cartera\ReportesController@reporte_deudas');

Route::get('reportes/pagos_ultima_semana', 'cartera\ReportesController@pagos_ultima_semana');

Route::get('reportes/pagos_ultimo_mes', 'cartera\ReportesController@pagos_ultimo_mes');

Route::resource('deuda', 'cartera\DeudaController');
Route::resource('plan_de_pago', 'cartera\Plan_de_pagoController');