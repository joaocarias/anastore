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

    Route::get('/tamanho_produtos', 'TamanhoProdutoController@index')->name('tamanho_produtos');
    Route::get('/tamanho_produtos/novo', 'TamanhoProdutoController@create')->name('novo_tamanho_produto');
    Route::post('/tamanho_produtos/store', 'TamanhoProdutoController@store')->name('cadastrar_tamanho_produto');
    
    Route::get('/cores', 'CorController@index')->name('cores');
    Route::get('/cores/novo', 'CorController@create')->name('nova_cor');
    Route::post('/cores/store', 'CorController@store')->name('cadastrar_cor');

    Route::get('/categoria_produtos', 'CategoriaProdutoController@index')->name('categoria_produtos');
    Route::get('/categoria_produtos/novo', 'CategoriaProdutoController@create')->name('nova_categoria_produto');
    Route::post('/categoria_produtos/store', 'CategoriaProdutoController@store')->name('cadastrar_categoria_produto');

    Route::get('/produtos', 'ProdutoController@index')->name('produtos');
    Route::get('/produtos/novo', 'ProdutoController@create')->name('novo_produto');
    Route::post('/produtos/store', 'ProdutoController@store')->name('cadastrar_produto');

    Route::get('/estoque_produtos', 'EstoqueProdutoController@index')->name('estoque_produtos');
    Route::get('/estoque_produtos/novo', 'EstoqueProdutoController@create')->name('nova_entrada_estoque_produto');
    Route::post('/estoque_produtos/store', 'EstoqueProdutoController@store')->name('cadastrar_entrada_estoque_produto');

    
});