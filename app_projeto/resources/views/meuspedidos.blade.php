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

@forelse ($vendas->where('venda_user_id', $idusuario) as $venda)
<div class="card mb-3">
        <div class="card-header">
                <h2>Meu Pedido</h2>
            </div>
            <div class="card-body table-responsive">
                    <table class="table mt-2 text-center">
                            <tr>
                                    <th>Nome do cliente</th>
                                    <th>Data de nascimento</th>
                                    <th>Data do pedido</th>
                                <th>Valor do pedido</th>  
                                <th >Cidade/Estado</th>
                               
                                <th >Endereço do cliente</th>
                                <th >Itens do pedido</th>
                                <th >Solicitar cancelamento do pedido</th>
                                
                            </tr>
                            <tr>
                                    <td> {{$venda->nome}}</td>
                                    <td >{{$venda->datanascimento}} </td>
                                    <td > {{$venda->created_at}}</td>
                                    <td >R${{$venda->valortotal}}</td>
                                    <td >{{$venda->cidade}}/{{$venda->estado}}</td>
                                   
                                    <td >{{$venda->ruaenumero}}</td>
                                    @php
                                       $idvenda= $venda->id;
                                    @endphp
                                    <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$idvenda}}">
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
                                          </div>  	</td>
                                    <td >
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Solicitar cancelamento
                                              </button>  
                                        <!-- Modal -->
                                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel"> Solicitar cancelamento</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="card mb-3">
                                                            <div class="card-header">
                                                                <h2> Instrução para solicitar cancelamento </h2>
                                                            </div>
                                                            @foreach($contatos as $contato)
                                                            <h2> Para solicitar cancelamento, entrar em contato via email: {{$contato->email}}</h2>
                                                           @endforeach
                                                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            
                                            </div>
                                          </div>
                                        </div>
                                      </div>  </td>
                                </tr>
                    </table>
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