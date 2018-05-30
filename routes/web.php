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
Route::get('articulo/generarPDF', 'ArticuloController@pdf');
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
Route::resource('pagos', 'PagosController');
Route::post('pagos/crear', 'PagosController@store');
Route::post('pagos/actualizar', 'PagosController@edit');
Route::get('articulo/consultarEstado',[
  'as' => 'consultarEstado', 
  'uses' => 'ArticuloController@index'
]);
Route::get('historicoPagos/filtro',[
  'as' => 'historicofiltro', 
  'uses' => 'HistoricoPagosController@index'
]);
Route::get('contratos',[
  'as' => 'contratosfiltro', 
  'uses' => 'ContratosController@index'
]);
Route::get('clientes',[
  'as' => 'clientesfiltro', 
  'uses' => 'ClientesController@index'
]);
Route::get('pagos',[
  'as' => 'pagosfiltro', 
  'uses' => 'PagosController@index'
]);
Route::resource('historicoIntereses','HistoricoPagosController');




//Route::post('/producto/store', ['uses' => 'ProductoController@store', 'as' => 'producto.store']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');

Route::get('pdf', function(){
  $pdf = PDF::loadView('prueba');
  return $pdf->download('archivo.pdf');
});

Route::get('pdf_articulos',array(
    'as'=>'pdf_articulos',
    'uses'=>'ArticuloController@generarReporte'
));
