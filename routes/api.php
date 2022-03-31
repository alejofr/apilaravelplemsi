<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//obtener resoluciones y facturas
Route::get('facturas', 'App\Http\Controllers\FacturasApiController@index');
//guardar Resolucion y Factura
Route::post('facturas', 'App\Http\Controllers\FacturasApiController@store');

//obtener notas debitos
Route::get('notas-debitos', 'App\Http\Controllers\NotasDebitoController@index');

//obtener clientes
Route::get('clientes', 'App\Http\Controllers\ClientesController@index');

//obtener clientes por ID
Route::get('clientes/id', 'App\Http\Controllers\ClientesController@show');

//obtener notas creditos
Route::get('notas-creditos', 'App\Http\Controllers\NotasCreditosController@index');