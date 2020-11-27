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
 }
   
        
 if( !function_exists( 'calculaFrete' ))
 {
    function calculaFrete(
       $cod_servico,
       $cep_origem,  
       $cep_destino, 
       $peso,        
       $altura,      
       $largura,     
       $comprimento,
       $valor_declarado='0'
    ){
 
       $cod_servico = strtoupper( $cod_servico );
       if( $cod_servico == 'SEDEX10' ) $cod_servico = 40215 ; 
       if( $cod_servico == 'SEDEXACOBRAR' ) $cod_servico = 40045 ; 
       if( $cod_servico == 'SEDEX' ) $cod_servico =40010; 
       if( $cod_servico == 'PAC' ){
           $cod_servico=41106;
         } 

       $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor_declarado."&sCdAvisoRecebimento=n&nCdServico=".$cod_servico."&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3";
 
       $xml = simplexml_load_file($correios);
 
       $_arr_ = array();
       if($xml->cServico->Erro == '0'):
          $_arr_['codigo'] = $xml -> cServico -> Codigo ;
          $_arr_['valor'] = $xml -> cServico -> Valor ;
          $_arr_['prazo'] = $xml -> cServico -> PrazoEntrega .' Dias' ;
          // return $xml->cServico->Valor;
          return $_arr_ ; 
       else:
          return false;
       endif;
    }
 }

     $origem = $_POST['origem'];
     $destino = $cep;
     $peso = $_POST['peso'];
     $altura = $_POST['altura'];
     $largura = $_POST['largura'];
     $comprimento = $_POST['comprimento'];
     $servico = $_POST['servico'];
     $_resultado = calculaFrete( 
         $servico, 
         $origem, 
         $destino, 
         $peso, 
         $altura, $largura, $comprimento, 0 );
         
        $mensagem = "Pedido finalizado";
        $produtosvenda = produtosvenda::all();
       // $produtos=$produtosvenda->produto()->first();//
        $vendas = venda::all();
        return view('meuspedidos')->with('mensagem', $mensagem)
        ->with('vendas', $vendas)->with('produtosvenda', $produtosvenda)->with('produtos', $produtos)
        ->with('_resultado', $_resultado);
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
