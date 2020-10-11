@extends('layouts.app')
@section('content')<br><br>
<div class="container">
    <div class="row">
        <p class="lead text-center">Carrinho:</p>
        <hr/>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">
                <strong><div class="alert alert-success">{{ Session::get('mensagem-sucesso') }}</div></strong>
            </div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">
                <strong>{{ Session::get('mensagem-falha') }}</strong>
            </div>
        @endif
        @forelse ($pedidos as $pedido)
            <br><br><br><br>
            <table class="table mt-2 text-center">
                <tr>
                    <th></th>
                        <th >Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Valor Total</th>
                </tr>
                @php
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->pedido_produtos as $pedido_produto)

                    <tr>
                        <td>
                            <img width="150"  src="storage/{{ $pedido_produto->produto->image }}">
                        </td>
                        <td class="center-align">
                            <div class="center-align">
                                 
                                <a class="col l4 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                    <i class="material-icons small">remove_circle_outline</i>
                                </a>
                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
                                <a class="col l4 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                    <i class="material-icons small">add_circle_outline</i>
                                </a>
                            </div>
                          
                        </td>
                        <td> {{ $pedido_produto->produto->nome }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        
                        @php
                            $total_produto = $pedido_produto;
                            $total_pedido = $total_produto;
                        @endphp
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        <td><a href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" data-position="right" data-delay="50"><button class="btn btn-danger">Retirar Produto</button></a></td>
                    </tr>
                    @endforeach
                
            </table>
      
          
            <div class="ml-auto p-2">
               
                <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <button type="submit" class="btn btn-success" data-position="top" data-delay="50" >
                        Concluir compra
                    </button>   
                </form></div>
                <div class="ml-auto p-2">
                <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                <span class="col l2 m2 s2">R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</span>
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    
</div>
</div>

<form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id">
    <input type="hidden" name="produto_id">
    <input type="hidden" name="item">
</form>
<form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
</form>

@push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>
@endpush
<br><br><br><br>
@endsection