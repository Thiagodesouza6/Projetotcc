@php

	use App\contatos;
	$contatos = contatos::all();

    $idusuario= Auth::user()->id;
@endphp
@extends('layouts.app')

@section('content')<br><br>
@if (!empty($mensagem))
<div class="alert alert-success"><p class="lead text-center">{{$mensagem}}</p> @if(!empty($_resultado))
  <p class="lead text-center"> Valor do frete:{{$_resultado['valor']}}</p><p  class="lead text-center">Prazo:{{$_resultado['prazo']}}</p>
    @endif </div> 
@else
    
@endif

@forelse ($vendas->where('venda_user_id', $idusuario)->where('checked', 'finalizado') as $venda)

<div class="card mb-3 col-sm">
        <div class="card-header">
                <h2>Meu Pedido</h2>
                @if ($venda->checked=='finalizado')
                <h2 class="text-right">Finalizado</h2>
                @else
                <h2 class="text-right">Em andamento</h2> 
                @endif
            </div>
            <div class="card-body table-responsive">
              @php
              $idvenda= $venda->id;
           @endphp
              <ul>
                  <li>Id do pedido: {{$venda->id}}</li><br>
                  <li>Número registrado: {{$venda->numerotelefone}}</li><br>
                  <li>Email do cliente: {{$venda->email}}</li><br>
                                    <li>Nome do cliente: {{$venda->nome}}</li><br>
                                   
                                    <li>Data do pedido {{$venda->created_at}}</li><br>
                                    <li>Valor do pedido: R${{$venda->valortotal}}</li><br>
                                    <li>Cidade/Estado:{{$venda->cidade}}/{{$venda->estado}}</li><br> 
                                    <li>Endereço do cliente:{{$venda->ruaenumero}}</li><br>
                                    
                                    <li>Itens do pedido:<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$idvenda}}">
                                      Ver Produtos
                                        </button>
                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$idvenda}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Produto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                      <div class="card mb-3">
                                                              <div class="card-header">
                                                                  <h2> Sua compra </h2>
                                                              </div>
                                                             
                                                              <table class="table mt-2 text-center">
                                                                <tr>
                                                                    <th>Imagem</th>
                                                                        <th>Nome</th>
                                                                        <th>Qtd</th>
                                                              
                                                                        
                                                                </tr>
                                                                @foreach ($produtosvenda->where('venda_id', $idvenda) as $produto)
                                                                <tr>
                                                                    <td><img src="../storage/{{ $produto->produto->image }}"  class="imagemproduto img-fluid img-thumbnail mb"> </td>
                                                                        <td>  {{$produto->produto->nome}}</td>
                                                                        <td> {{$produto->qtd}}</td>
                                                              
                                                                </tr>
                                                                @endforeach
                                                              </table>
                                                                                              </div>
                                              </div>
                                              <div class="modal-footer">
                                              
                                              </div>
                                            </div>
                                          </div>
                                        </div> </li><br>
                                   <br>
                               
                              </ul>
            </div>


        </div>
    
        @empty
        <div class="alert alert-danger"><p class="lead text-center">Não há pedidos</p></div>
        @endforelse
    <br><br>
    @endsection
    @section('header')
    @include('inc.header')
    @endsection
    @section('footer')
    @include('inc.footer')
    @endsection