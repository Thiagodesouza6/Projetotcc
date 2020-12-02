<?php

namespace App\Http\Controllers;
use App\User;
use App\Produto;
use App\venda;
use App\Pedido;
use App\PedidoProduto;
use App\produtosvenda;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class PedidosController extends Controller
{
    
 
    public function compra(Request $request)
    {
         
        $venda = new venda();

        $request->get('valortotal');
        $venda->valortotal = $request->get('valortotal');
        $venda->venda_user_id =  $request->get('venda_user_id');
        $venda->nome = $request->get('nome');
        $venda->email =  $request->get('email');
        $venda->cpf =  $request->get('cpf');
        $venda->datanascimento =  $request->get('datanascimento');
        $venda->estado = $request->get('estado');
        $venda->cidade= $request->get('cidade');
        $venda->cep = $request->get('cep');
        $venda->ruaenumero =  $request->get('ruaenumero');
        $venda->complemento = $request->get('complemento');
        $venda->numerotelefone =  $request->get('numerotelefone');
        $venda->prazo =  $request->get('prazo');
        $venda->save();

        $venda_id=$venda->id;
       
        $cep=$venda->cep;
      
       
 foreach($request->produtospedido as $produtos){
    
    $produtosvenda= new produtosvenda();
    $array = json_decode($produtos);
    $produtosvenda->produtos_id =$array->produto_id;
     $produtosvenda->qtd=$array->qtd;

    $produtosvenda->venda_id=$venda_id;
    $produtosvenda->save();  
    $p = Produto::find($produtosvenda->produtos_id); 
    $p->quantidade = $p->quantidade-$produtosvenda->qtd;
    $p->save();
 }
        $pedidos = Pedido::where([
        
            'user_id' => $venda->venda_user_id
            ]);
        $pedidos->delete();
      
        $mensagem = "Pedido Finalizado!";
        $produtosvenda = produtosvenda::all();
       // $produtos=$produtosvenda->produto()->first();//
        $vendas = venda::all();
        return view('meuspedidos')->with('mensagem', $mensagem)
        ->with('vendas', $vendas)->with('produtosvenda', $produtosvenda)
        ;
    }
    public function apagarpedidos($id)
    {
              
        $venda = venda::find($id);        
        
        $venda->delete();   
          
        $mensagem = "Pedido excluído com sucesso!";        
             
        $vendas = venda::all();        
        $produtosvenda = produtosvenda::all();   
        return view('pedidos')->with('mensagem', $mensagem)->with('vendas', $vendas)->with('produtosvenda', $produtosvenda);  
    }
  public function exibirmeuspedidos()
    {
        $produtosvenda=produtosvenda::all();
     $produtos=Produto::all();
        $vendas = venda::all();
      /*  $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
        $users = DB::table('pedidos')
            ->join('venda', 'venda_pedido_id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/
            
        $users=User::where([
            'id'=>Auth::id()
        ])->get();
        $compras = venda::where([
           
            'venda_user_id' => Auth::id()
            ])->orderBy('created_at')->get();

        $cancelados = Pedido::where([
          
            'user_id' => Auth::id()
            ])->orderBy('updated_at')->get();
          //  $prodvenda= $produtosvenda->produto();
        return view('meuspedidos', compact('compras', 'cancelados','users','vendas','produtosvenda','produtos','prodvenda'));
   
    }
    public function exibirpedidos()
    {
        $produtosvenda=produtosvenda::all();
        $produtos = Produto::all();
        $vendas = venda::all();
        return view('pedidos',compact('produtos','vendas','produtosvenda'));
    }

	
   
}
