<script type="text/javascript" src="{{ asset('js/submit.js') }}"></script>
@extends('layouts.app')

@section('content')<br><br>
@php

$contador=0;
@endphp  
<div class="jumbotron jumbotron-fluid">
    <div class="container">
     
        <h1 class="display-4">Ótima escolha!</h1>
      
    </div>
</div>
<div class="container">
   
<div class="card mb-3">
    <div class="card-header">
        <h2>Sua compra</h2>
    </div>
    @forelse ($compras as $pedido)
    
    <div class="card-body">
        <table class="table mt-2 text-center">
            <tr>
                    <th></th>
                <th>Produtos</th>
                <th >Qtd</th>
                <th>Preço</th>
            </tr>
           
                             @php
                                 $idpedidos=$pedido->id;
                                 $total_pedido = 0;
                                 $peso_total=0;
                                 $altura_total=0;
                                 $comprimento_total=0;
                                 $largura_total=0;
                           @endphp
                                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                                       
                                  
                                        @php
                                          $peso_total+=$pedido_produto->produto->peso;
                           $altura_total+= $pedido_produto->produto->altura;
                           $comprimento_total+=$pedido_produto->produto->comprimento;
                           $largura_total+=$pedido_produto->produto->largura;
                                        $total_produto = $pedido_produto->valores ;
                                        $total_pedido += $total_produto;
                                    @endphp
                                        <tr>
                                            <td> <img src="../storage/{{ $pedido_produto->produto->image }}"  class="imagemproduto img-fluid img-thumbnail mb"></td>
                                            <td >{{ $pedido_produto->produto->nome }} </td>
                                            <td >{{ $pedido_produto->qtd}} </td>
                                            <td >R$ {{ number_format($total_produto, 2, ',', '.')}} </td>
                                        </tr>
                                        @endforeach
                    </table>
                                       <p class="text-right">Total do pedido:
                                        R$ {{ number_format($total_pedido, 2, ',', '.')   }}+Frete </p>
                                    
                                    </div>
                                    @empty
                                            <h5 class="center">
                                                @if ($cancelados->count() > 0)
                                                    Neste momento não há nenhuma compra valida.
                                                @else
                                                    Você ainda não fez nenhuma compra.
                                                @endif
                                            </h5>
                                    @endforelse
                                    </div>
                                
                                    <form action="{{ route('pedido.compra') }}" name="form1" method="POST"> 
          {{ csrf_field() }}
         
    <fieldset>
     
            <input type="hidden" class="form-control" name="origem" id="cep-origem" value="14802251" />  				
            <input type="hidden" class="form-control" name="peso" id="peso" value="{{$peso_total}}"/>  
            <input type="hidden" class="form-control" name="altura" id="altura" value="{{$altura_total}}" />  
            <input type="hidden" class="form-control" name="largura" id="largura" value="{{$largura_total}}"/> 
            <input type="hidden" class="form-control" name="comprimento" id="comprimento" value="{{$comprimento_total}}" />  
        <input type="hidden" name="valortotal" value="{{ $total_pedido}}">
        <legend><p class="lead text-center">Dados pessoais</p></legend>
        @foreach($users as $user)	    
        <input type="hidden" name="venda_user_id" value="{{$user->id}}">
       
        <div class="form-group">
            <label for="nome">Nome completo <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$user->name}}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email <span class="text-danger">*</span></label>
            <div class="input-group ">
                <div class="input-group-pretend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
            </div>
        </div>
        @endforeach
        <div class="form-group form-row">
                <div class="col">
            <label for="cpf">CPF <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
                <div class="col">
                    </div>
        </div>
       
        <div class="form-group">
            <label for="datanascimento">Data de Nascimento <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="" required>
        </div>
        <div class="form-group"> 
            <label for="estado">Estado <span class="text-danger">*</span></label>
            <select class="form-control"  id="estado" name="estado" required>
                <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
            </select>

        </div>
      
        
        <div class="form-group">
            
                <label for="cidade">Cidade <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" required>
                
            </div>
            <div class="form-group">
            <label>SERVIÇO</label>
            <select class="form-control" name="servico">
              <option value="SEDEX">SEDEX</option>
              <option value="PAC">PAC</option>
          </select>
        </div>
        <div class="form-group">
            <label for="cep">CEP <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="ruaenumero">Endereço <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ruaenumero" name="ruaenumero" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="complemento">Complemento </label>
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="" >
        </div>
        <div class="form-group">
            <label for="numerotelefone">Número Telefone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="numerotelefone" name="numerotelefone" placeholder="" required>
        </div>
     
        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
        <input type="hidden" name="produtospedido[{{$pedido_produto}} ]" value="{{$pedido_produto}}"> 
    <input type="hidden" name="produto[{{$pedido_produto->produto_id}}]" value="{{$pedido_produto->produto_id}}" >
        <input type="hidden" name="qtd[{{$pedido_produto->qtd}}]" value="{{$pedido_produto->qtd}}" >
        
       
        @endforeach 
    </fieldset>
    <fieldset>
        <legend>Cartão de crédito</legend>
        <div class="form-group">
            <label for="numero-cartao">Número - CVV</label>
            <input type="text" class="form-control" id="numero-cartao" name="numero-cartao">
        </div>
        <div class="form-group">
                <div class="input-group mb-3">
                        <div class="input-group-pretend">
                            <label class="input-group-text" for="bandeira-cartao">Bandeira</label>
                        </div>
                        <select class="custom-select" id="bandeira-cartao">
                            <option disabled selected>Selecione uma opção...</option>
                            <option value="master">MasterCard</option>
                            <option value="visa">VISA</option>
                            <option value="amex">American Express</option>
                        </select>
                </div>            
        </div>
        <div class="form-group">
            <label for="validade-cartao">Validade</label>
            <input type="month" class="form-control" id="validade-cartao" name="validade-cartao">
        </div>
    </fieldset>
    <div>Os campos marcados com <span class="text-danger">*</span> não podem estar em branco.</div>
    
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Confirmar Pedido
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmação de compra</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Quer confirmar a compra?
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

</div>
<br><br><br>
@endsection
@section('header')
@include('inc.header')
@endsection
@section('footer')
@include('inc.footer')
@endsection
