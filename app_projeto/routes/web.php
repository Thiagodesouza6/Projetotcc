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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produtos/{id}', 'ProdutoController@produto_compra');
Route::get('/checkout',['middleware'=>'auth.role', function  () {
    return view('checkout');
}]);
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function() {
    return redirect()->route('carrinho.index');
});
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');


Route::get('/armazenagem', 'ProdutoController@exibiramarzenagem'); 
Route::get('/freezer', 'ProdutoController@exibirfreezer'); 
Route::get('/garrafa', 'ProdutoController@exibirgarrafa');
Route::get('/listagem', 'ProdutoController@listagem')->middleware('auth.role');
Route::get('/produtos/pesquisar', 'ProdutoController@pesquisar');
Route::post('/produtos/pesquisar', 'ProdutoController@pesquisar');
Route::get('/produtos/inserir/{id}', 'ProdutoController@mostrar_inserir')->middleware('auth.role');
Route::post('/produtos/inserir', 'ProdutoController@inserir')->middleware('auth.role');
Route::get('/produtos/alterar/{id}', 'ProdutoController@mostrar_alterar')->middleware('auth.role');
Route::post('/produtos/alterar', 'ProdutoController@alterar')->middleware('auth.role');
Route::get('/produtos/excluir/{id}', 'ProdutoController@excluir')->middleware('auth.role');