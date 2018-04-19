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
Route::get('/categorias','CategoriasController@index');
Route::get('articulo/create','ArticuloController@create');
Route::post('articulo/store', 'ArticuloController@store');
Route::post('articulo/actualizar', 'ArticuloController@edit');
Route::resource('articulos', 'ArticuloController');
Route::resource('categorias', 'CategoriasController');
Route::post('categorias/crear', 'CategoriasController@store');
Route::post('categorias/actualizar', 'CategoriasController@edit');
Route::post('contratos/actualizar', 'ContratosController@edit');
Route::post('contratos/crear', 'ContratosController@store');
Route::resource('contratos', 'ContratosController');
Route::resource('clientes', 'ClientesController');
Route::post('clientes/crear', 'ClientesController@store');
Route::post('clientes/actualizar', 'ClientesController@edit');


//Route::post('/producto/store', ['uses' => 'ProductoController@store', 'as' => 'producto.store']);
