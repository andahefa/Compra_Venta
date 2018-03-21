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


//Route::controller('producto','ProductoController');
Route::get('/index','ArticuloController@index');
Route::get('articulo/create','ArticuloController@create');
Route::post('articulo/store', 'ArticuloController@store');
Route::post('articulo/actualizar', 'ArticuloController@edit');


//Route::post('/producto/store', ['uses' => 'ProductoController@store', 'as' => 'producto.store']);