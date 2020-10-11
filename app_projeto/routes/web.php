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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produtos/{id}', 'ProdutoController@produto_compra');
Route::get('/checkout', function  () {
    return view('checkout');
});
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function() {
    return redirect()->route('carrinho.index');
});
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');


Route::get('/armazenagem', 'ProdutoController@exibirprodutos');
Route::get('/listagem', 'ProdutoController@listagem');
Route::get('/produtos/pesquisar', 'ProdutoController@pesquisar');
Route::post('/produtos/pesquisar', 'ProdutoController@pesquisar');
Route::get('/produtos/inserir/{id}', 'ProdutoController@mostrar_inserir');
Route::post('/produtos/inserir', 'ProdutoController@inserir');
Route::get('/produtos/alterar/{id}', 'ProdutoController@mostrar_alterar');
Route::post('/produtos/alterar', 'ProdutoController@alterar');
Route::get('/produtos/excluir/{id}', 'ProdutoController@excluir');