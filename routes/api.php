<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//obtener resoluciones y facturas
Route::get('facturas', 'App\Http\Controllers\FacturasApiController@index');
Route::get('facturas/show', 'App\Http\Controllers\FacturasApiController@obtener_factura');

//guardar Resolucion y Factura
Route::post('facturas', 'App\Http\Controllers\FacturasApiController@store');

//obtener notas debitos
Route::get('notas-debitos', 'App\Http\Controllers\NotasDebitoController@index');

//obtener clientes
Route::get('clientes', 'App\Http\Controllers\ClientesController@index');

//obtener clientes por ID
Route::get('clientes/id', 'App\Http\Controllers\ClientesController@cliente_id');

//obtener clientes por filtro
Route::get('clientes/filtro', 'App\Http\Controllers\ClientesController@cliente_filtro');

//guardar cliente
Route::post('clientes', 'App\Http\Controllers\ClientesController@store');

//actualizar cliente
Route::post('clientes/update', 'App\Http\Controllers\ClientesController@actualizar');

//obtener notas creditos
Route::get('notas-creditos', 'App\Http\Controllers\NotasCreditosController@index');