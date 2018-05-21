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
    return view('home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/', 'DadosController@store');
	Route::get('/listar', 'DadosController@index');
	Route::view('/previsao', 'previsao');
	Route::get('/edit/{id}' , 'DadosController@edit');
	Route::put('/edit/{id}' , 'DadosController@edit');
	Route::put('/edit/{id}' , 'DadosController@update');
	Route::delete('listar/delete/{id}', 'DadosController@destroy');
	Route::view('/total', 'acumulado');
	Route::post('/acumulado', 'DadosController@getSoma');
	Route::get('/acumulado', 'DadosController@getSoma');
 });


