<?php

namespace App\Http\Controllers;
use App\User;
use App\Produto;
use Request;
use File;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    
    public function exibiramarzenagem()
    {   
        $produtos = Produto::all();
       
        $produtos = Produto::where('categoria', 'like', '%'.'Armazenar'.'%')->get();
        return view('armazenagem')->with('produtos', $produtos);
    }
    public function exibirfreezer()
    {   
        $produtos = Produto::all();
       
        $produtos = Produto::where('categoria', 'like', '%'.'Freezer'.'%')->get();
        return view('armazenagem')->with('produtos', $produtos);
    } 
    public function exibirgarrafa()
    {   
        $produtos = Produto::all();
       
        $produtos = Produto::where('categoria', 'like', '%'.'Garrafa'.'%')->get();
        return view('armazenagem')->with('produtos', $produtos);
    }
    public function listagem()
    {
   
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
        $produto->tag = Request::get('tag');
        $produto->capacidade = Request::get('capacidade');
        $produto->peso = Request::get('peso');
        $produto->largura= Request::get('largura');
        $produto->comprimento = Request::get('comprimento');
        $produto->altura = Request::get('altura');
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
        $p->image = Request::file('image')->store('');
        $p->categoria = Request::get('categoria');
        $p->tag = Request::get('tag');
        $p->capacidade = Request::get('capacidade');
        $p->peso = Request::get('peso');
        $p->largura= Request::get('largura');
        $p->comprimento = Request::get('comprimento');
        $p->altura = Request::get('altura');
        $p->cor = Request::get('cor');
        
        $p->save();

        $mensagem = "Produto alterado com sucesso!";
        $produtos = Produto::all();
        return view('listagem')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }
    public function excluir($id)    {        
          
        $produto = Produto::find($id);        
        Storage::delete($produto->image);
        $produto->delete();   
          
        $mensagem = "Produto excluído com sucesso!";        
             
        $produtos = Produto::all();        
          
        return view('listagem')->with('mensagem', $mensagem)->with('produtos', $produtos);    
    }
    
   
}
