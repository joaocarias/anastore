<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/usuarios', 'UsuarioController@index')->name('usuarios');

    Route::get('/cidades', 'CidadeController@index')->name('cidades');
    Route::get('/cidades/novo', 'CidadeController@create')->name('nova_cidade');
    Route::post('/cidades/store', 'CidadeController@store')->name('cadastrar_cidade');

    Route::get('/clientes', 'ClienteController@index')->name('clientes');
    Route::get('/clientes/novo', 'ClienteController@create')->name('novo_cliente');
    Route::post('/clientes/store', 'ClienteController@store')->name('cadastrar_cliente');
    

});