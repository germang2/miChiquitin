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

Route::get('/cartera/index', function (){
  return view('/cartera/index');
});

Route::get('/cartera/consultar', function (){
  return view('/cartera/consultar');
});

Route::get('/cartera/nuevo', function (){
  return view('/cartera/nuevo');
});

Route::get('/cartera/informe', function (){
  return view('/cartera/informe');
});
