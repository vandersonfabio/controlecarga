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
    return view('auth/login');
});



Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('item/fabricante', 'FabricanteController');
    Route::resource('item/tipo', 'TipoController');
    Route::resource('item/situacao', 'SituacaoController');
    Route::resource('item/item', 'ItemController');

    Route::resource('policial', 'PolicialController');
    Route::resource('setor', 'SetorController');
    Route::resource('alocacao', 'AlocacaoController');
    Route::resource('relatorio', 'RelatorioController');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');