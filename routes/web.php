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


Route::resource('item/fabricante', 'FabricanteController');
Route::resource('item/tipo', 'TipoController');
Route::resource('item/situacao', 'SituacaoController');
Route::resource('item/item', 'ItemController');

Route::resource('policial', 'PolicialController');
Route::resource('setor', 'SetorController');