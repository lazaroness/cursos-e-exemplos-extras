<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ROTA PADRAO DO LARAVEL
Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/update/{id}', 'ProdutoController@update');
Route::post('/produtos/update_do', 'ProdutoController@update_do');

Route::get('/produtos/json', 'ProdutoController@listaJson');