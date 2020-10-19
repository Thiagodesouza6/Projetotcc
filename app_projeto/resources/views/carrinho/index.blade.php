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
                                    <form method="POST" id="form-remover-produto" action="{{ route('carrinho.remover') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="pedido_id">
                                            <input type="hidden" name="produto_id">
                                            <input type="hidden" name="item">
                                            <button class="btn" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )"> 
                                                 <i class="material-icons small">remove_circle_outline</i></button> 
                                     
                                        
                                        </form>
                                    
                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
                                   
                                   @if ($pedido_produto->produto->quantidade-$pedido_produto->qtd<0)
                                   <div class="alert alert-danger mt-2">limite atingido</div>
                                   @else
                                   <form action="{{ route('carrinho.adicionar') }}" method="POST">   
                                    <br>
                                    <div class="d-flex justify-content-center">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{  $pedido_produto->produto->id }}">
                                            <button class="btn " >  <i class="material-icons small">add_circle_outline</i></button>  
                                 
                                </div>
                                </form>
                                   @endif
                               
                            </div>
                          
                        </td>
                        <td> {{ $pedido_produto->produto->nome }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        
                        @php
                            $total_produto = $pedido_produto->valores;
                            $total_pedido += $total_produto;
                        @endphp
                        <td>R$ {{ $total_produto  }}</td>
                        <td>
                                <form method="POST" id="form-remover-produto" action="{{ route('carrinho.remover') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="pedido_id">
                                        <input type="hidden" name="produto_id">
                                        <input type="hidden" name="item">
                                        <button class="btn btn-danger" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)"> 
                                                Retirar Produto</button> 
                                 
                                    
                                    </form></td>
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
                <span class="col l2 m2 s2">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>
        @empty
        <br><br><br><br><br>
            <p class="lead text-center">Não há nenhum pedido no carrinho</h5>
        @endforelse
    
</div>
</div>

    <script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>

<br><br><br><br><br><br><br><br><br>

@endsection
@section('header')
@include('inc.header')
@endsection
@section('footer')
@include('inc.footer')
@endsection