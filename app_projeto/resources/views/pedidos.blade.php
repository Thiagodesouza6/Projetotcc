
@extends('layouts.app')

@section('content')<br><br>


@forelse ($vendas as $venda)
<div class="card mb-3">
        <div class="card-header">
                <h2>Pedido</h2>
            </div>
            <div class="card-body table-responsive">
                    <table class="table mt-2 text-center">
                            <tr>
                                    <th>Nome do cliente</th>
                                    <th>Data de nascimento</th>
                                    <th>CPF do cliente</th>
                                <th>Valor do pedido</th>  
                                <th >Cidade/Estado</th>
                                <th >Cep do cliente</th>
                                <th >Endereço do cliente</th>
                                <th >Itens do pedido</th>
                                <th >Número telefone</th>
                                
                            </tr>
                            <tr>
                                    <td> {{$venda->nome}}</td>
                                    <td >{{$venda->datanascimento}} </td>
                                    <td > {{$venda->cpf}}</td>
                                    <td >R${{$venda->valortotal}}</td>
                                    <td >{{$venda->cidade}}/{{$venda->estado}}</td>
                                    <td >{{$venda->cep}}</td>
                                    <td >{{$venda->ruaenumero}}</td>
                                    @php
                                        $idvenda=$venda->id;
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
                                                                            <h2> Produtos do pedido </h2>
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
                                    <td >{{$venda->numerotelefone}}</td>
                                    <td ><a href="/pedidos/{{$venda->id}}"><i class="fa fa-trash" ></i></a></td>
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