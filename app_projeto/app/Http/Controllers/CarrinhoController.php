<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;


class CarrinhoController extends Controller
{   
   /* public function remover()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido= $req->input('pedido_id');
        $idusuario = Auth::id();

        $idproduto          = $req->input('produto_id');
        $remove_apenas_item = (boolean)$req->input('item');
    

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
           
            ]);
    $pedido_produtos = PedidoProduto::where([
        'pedido_id' => $idpedido,
        
    ])->get();
    $pedido_produtos->qtd = $pedido_produtos->qtd-1;

    $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

    return redirect()->route('carrinho.index');

    }*/
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index()
    {
        $req = Request();
        $idproduto = $req->input('id');
        $produto = Produto::find($idproduto);
      
        $pedidos = Pedido::where([
  
            'user_id' => Auth::id()
            ])->get();
           
        return view('carrinho.index', compact('pedidos'))->with('produto', $produto);
    }
    public function adicionar()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduto = $req->input('id');

        $produto = Produto::find($idproduto);
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->route('carrinho.index');
        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
        
            ]);

        if( empty($idpedido) ) {
            $pedido_novo = Pedido::create([
                'user_id' => $idusuario,
                
                ]);

            $idpedido = $pedido_novo->id;

        }

        PedidoProduto::create([
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto,
            'valor'      => $produto->valor,
          
            ]);

        $req->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('carrinho.index');

    }
    public function remover()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('pedido_id');
        $idproduto          = $req->input('produto_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
           
            ]);

        if( empty($idpedido) ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id')->first();
        if( empty($produto->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
            return redirect()->route('carrinho.index');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
            ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
                ])->delete();
        }

        $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('carrinho.index');
    }

    public function concluir()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido  = $req->input('pedido_id');
        $idusuario = Auth::id();

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
  
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->exists();
        if(!$check_produtos) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.index');
        }

        PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->update([
                'status' => 'PA'
            ]);
            Pedido::where([
                'id' => $idpedido
            ]);

        $req->session()->flash('mensagem-sucesso', 'Compra concluída com sucesso!');

        return redirect()->route('carrinho.compras');
    }

    public function compras()
    {

        $compras = Pedido::where([
           
            'user_id' => Auth::id()
            ])->orderBy('created_at')->get();

        $cancelados = Pedido::where([
          
            'user_id' => Auth::id()
            ])->orderBy('updated_at')->get();

        return view('carrinho.compras', compact('compras', 'cancelados'));

    }

    public function cancelar()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido       = $req->input('pedido_id');
        $idspedido_prod = $req->input('id');
        $idusuario      = Auth::id();

        if( empty($idspedido_prod) ) {
            $req->session()->flash('mensagem-falha', 'Nenhum item selecionado para cancelamento!');
            return redirect()->route('carrinho.compras');
        }

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
          
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado para cancelamento!');
            return redirect()->route('carrinho.compras');
        }

        $check_produtos = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->exists();

        if( !$check_produtos ) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.compras');
        }

        PedidoProduto::where([
                'pedido_id' => $idpedido,
               
            ])->whereIn('id', $idspedido_prod)->update([
                'status' => 'CA'
            ]);

        $check_pedido_cancel = PedidoProduto::where([
                'pedido_id' => $idpedido,
                
            ])->exists();

        if( !$check_pedido_cancel ) {
            Pedido::where([
                'id' => $idpedido
            ]);

            $req->session()->flash('mensagem-sucesso', 'Compra cancelada com sucesso!');

        } else {
            $req->session()->flash('mensagem-sucesso', 'Item(ns) da compra cancelado(s) com sucesso!');
        }

        return redirect()->route('carrinho.compras');
    }

    public function desconto()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido  = $req->input('pedido_id');
    
        $idusuario = Auth::id();


     


        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
           
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado para validação!');
            return redirect()->route('carrinho.index');
        }

        $pedido_produtos = PedidoProduto::where([
                'pedido_id' => $idpedido,
                
            ])->get();

        if( empty($pedido_produtos) ) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.index');
        }

        $aplicou_desconto = false;
        foreach ($pedido_produtos as $pedido_produto) {

            switch ($cupom->modo_desconto) {
                case 'porc':
                    $valor_desconto = ( $pedido_produto->valor * $cupom->desconto ) / 100;
                    break;

                default:
                    $valor_desconto = $cupom->desconto;
                    break;
            }

            $valor_desconto = ($valor_desconto > $pedido_produto->valor) ? $pedido_produto->valor : number_format($valor_desconto, 2);

            switch ($cupom->modo_limite) {
                case '#':
                    $qtd_pedido = PedidoProduto::whereIn('status', ['PA', 'RE'])->where([
                            'cupom_desconto_id' => $cupom->id
                        ])->count();

                    if( $qtd_pedido >= $cupom->limite ) {
                        continue;
                    }
                    break;

              
                    break;
            }

            $pedido_produto->cupom_desconto_id = $cupom->id;
            $pedido_produto->desconto          = $valor_desconto;
            $pedido_produto->update();

           

        }

        
        return redirect()->route('carrinho.index');

    }
    public function excluir($id)    {        
          
        $produto = Produto::find($id);        
                
        $produto->delete();   
          
        $mensagem = "Produto excluído com sucesso!";        
             
        $produtos = Produto::all();        
          
        return view('listagem')->with('mensagem', $mensagem)->with('produtos', $produtos);    
    }
    
}
