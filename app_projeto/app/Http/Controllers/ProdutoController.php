<?php

namespace App\Http\Controllers;
use App\User;
use App\Produto;

use Request;
use File;
class ProdutoController extends Controller
{
    public function exibirprodutos()
    {
        
        $produtos = Produto::all();
      
        return view('armazenagem')->with('produtos', $produtos);
    }
    public function listagem()
    {
        $this->authorize('listagem') ;
        $produtos = Produto::all();
        
        
        
        
         return view('listagem')->with('produtos', $produtos);
    }
   public function pesquisar()
   {
	   $produtos = Produto::all();
	
        $nome = Request::get('nome');

        $produtos = Produto::where('nome', 'like', '%'.$nome.'%')->get();
	   
	   
		return view('produto.pesquisar')->with('produtos', $produtos);
   }
   
   public function mostrar_inserir()
   {
    $this->authorize('produto.inserir') ;
	   return view('produto.inserir');
   }
 
    public function inserir()
    {
           
        $produto = new Produto();

        $produto->descricao = Request::get('descricao');
        $produto->quantidade = Request::get('quantidade');
        $produto->valor = Request::get('valor');
        $produto->nome = Request::get('nome');
       
        if(Request::file('image')->isValid()){
          
            $produto->image=Request::file('image')->store('');
        
        }
        $produto->categoria = Request::get('categoria');
        $produto->capacidade = Request::get('capacidade');
        $produto->dimensoes = Request::get('dimensoes');
        $produto->cor = Request::get('cor');

      
        $produto->save();

    
        $mensagem = "Produto inserido com sucesso";

        return view('produto.inserir')->with('mensagem', $mensagem);
        
    }

	public function produto_compra($id)
    {
  
        $produto = Produto::find($id);

        return view('produtos')->with('produto', $produto);
    }

	public function mostrar_alterar($id)
    {
        $this->authorize('produto.alterar') ;
        $produto = Produto::find($id);
        return view('produto.alterar')->with('produto', $produto);
    }
	
	public function alterar()
    {
        $id = Request::get('id');
        $p = Produto::find($id);
        $p->nome = Request::get('nome');
        $p->descricao = Request::get('descricao');
        $p->quantidade = Request::get('quantidade');
        $p->valor = Request::get('valor');
        
      
        $p->categoria = Request::get('categoria');
        $p->capacidade = Request::get('capacidade');
        $p->dimensoes = Request::get('dimensoes');
        $p->cor = Request::get('cor');
        $p->image = Request::file('image');
        $p->save();

        $mensagem = "Produto alterado com sucesso!";
        $produtos = Produto::all();
        return view('listagem')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }
    public function excluir($id)    {        
          
        $produto = Produto::find($id);        
                
        $produto->delete();   
          
        $mensagem = "Produto excluído com sucesso!";        
             
        $produtos = Produto::all();        
          
        return view('listagem')->with('mensagem', $mensagem)->with('produtos', $produtos);    
    }
    
   
}
