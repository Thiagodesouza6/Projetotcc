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
            <div class="card-panel red text-center">
                <strong><div class="alert alert-danger">{{ Session::get('mensagem-falha') }}</div></strong>
            </div>
        @endif
        @forelse ($pedidos as $pedido)
            <br><br><br><br>
            <div class="table-responsive">
            <table class="table mt-2 text-center">
                <tr>
                    <th></th>
                        <th >Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Valor Total</th>
                </tr>
                @php
                  $total_quantidade2=0;
                 $total_quantidade=0;
                 $comprimento_total=0;
                 $largura_total=0;
                 $altura_total=0;
                        $peso_total=0;
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->pedido_produtos as $pedido_produto)
               
                    <tr>
                        <td>
                            <img width="150"  src="storage/{{ $pedido_produto->produto->image }}">
                        </td>
                        <td class="center-align">
                            <div class="center-align">
                                    @if ($pedido_produto->produto->quantidade-$pedido_produto->qtd<=0)
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
                                    
                                    
                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
                                   
                                <form method="POST" id="form-remover-produto" action="{{ route('carrinho.remover') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="pedido_id">
                                        <input type="hidden" name="produto_id">
                                        <input type="hidden" name="item">
                                        <button class="btn" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )"> 
                                             <i class="material-icons small">remove_circle_outline</i></button> 
                                 
                                    
                                    </form>
                               
                            </div>
                          
                        </td>
                        <td> {{ $pedido_produto->produto->nome }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        
                        @php
                           $peso_total+=$pedido_produto->produto->peso*$pedido_produto->qtd ;
                           $altura_total+= $pedido_produto->produto->altura*$pedido_produto->qtd;
                           $comprimento_total+=$pedido_produto->produto->comprimento*$pedido_produto->qtd;
                           $largura_total+=$pedido_produto->produto->largura*$pedido_produto->qtd;
                            $total_produto = $pedido_produto->valores;
                            $total_pedido += $total_produto;
                           $total_quantidade += $pedido_produto->produto->quantidade;
                           $total_quantidade2 += $pedido_produto->qtd;
                        @endphp
                        <td>R$ {{ number_format($total_produto, 2, ',', '.')   }}</td>
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
        </div>
            <div><form action="{{ route('carrinho.frete') }}" method="post">
                {{ csrf_field() }}
                <div class="row panel-body" align="left">
              <div class="col-md-12">
              
              <div class="col-sm">
                  <label>SERVIÇO</label>
                    <select class="form-control" name="servico">
                      <option value="SEDEX">SEDEX</option>
                      <option value="PAC">PAC</option>
                  </select>
                </div>
              
              <div class="col-sm">
              
                    <input type="hidden" class="form-control" name="origem" id="cep-origem" value="14802251" />  				
                    <input type="hidden"class="form-control" name="peso" id="peso" value="{{$peso_total}}"/>  
                    <input type="hidden" class="form-control" name="altura" id="altura" value="{{$pedido_produto->produto->altura}}" />  
                    <input type="hidden" class="form-control" name="largura" id="largura" value="{{$pedido_produto->produto->largura}}"/> 
                    <input type="hidden" class="form-control" name="comprimento" id="comprimento" value="{{$comprimento_total}}" />  	
              <div class="form-group">
                  <label>CEP DESTINO</label>
                    <input type="text" class="form-control" name="destino" id="cep-destino" required/>  				
                </div>
               
              
              <div class="form-group">
              <button class="btn btn-info">Calcular Frete</button>
              </div>
              @if(!empty($_resultado))
              <div class="alert alert-success">Valor:{{$_resultado['valor']}}<p>Prazo:{{$_resultado['prazo']}}</p></div>
              @endif  
            </div>
        </div>
    </div>
              </form>
            </div>




            <div class="ml-auto p-2 text-right">
               
               
                
                <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                <span class="col l2 m2 s2">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
                <br><br>
                @if ($total_quantidade2>$total_quantidade)
                <div class="alert alert-danger mt-2 text-center">Quantidade não disponível</div>
                @else
                <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Concluir Compra
                          </button>
              
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Insira o CEP para continuar</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                        <div class="card mb-3">
                                               
                                               
                                              <br>
                                              <div class="text-left">
                                                    <label>SERVIÇO</label>
                                                      <select class="form-control" name="servico">
                                                        <option value="SEDEX">SEDEX</option>
                                                        <option value="PAC">PAC</option>
                                                    </select>
                                                
                                                </div>
                                                    <br>
                                                    <div class="text-left">
                                                      <input type="hidden" class="form-control" name="origem" id="cep-origem" value="14802251" />  				
                                                      <input type="hidden" class="form-control" name="peso" id="peso" value="{{$peso_total}}"/>  
                                                      <input type="hidden" class="form-control" name="altura" id="altura" value="{{$pedido_produto->produto->altura}}" />  
                                                      <input type="hidden" class="form-control" name="largura" id="largura" value="{{$pedido_produto->produto->largura}}"/> 
                                                      <input type="hidden" class="form-control" name="comprimento" id="comprimento" value="{{$comprimento_total}}" />  	
                                                <div class="form-group">
                                                    <label>CEP DESTINO</label>
                                                      <input type="text" class="form-control" name="destino" id="cep-destino" required/>  				
                                                  </div>
                                                </div>
                                                </div>
                                                                             
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" data-toggle="modal">
                                      Confirmar 
                                    </button>
                                </div>
                              </div>
                            </div>
                          </div>  
                </form>
                @endif
             
        </div>
        </div>
        @empty
        <br><br><br><br><br>
            <p class="lead text-center">Não há nenhum pedido no carrinho</h5>
        @endforelse
    
</div></div>


    <script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>

<br><br><br><br><br><br><br><br><br>

@endsection
@section('header')
@include('inc.header')
@endsection
@section('footer')

@include('inc.footer')
@endsection