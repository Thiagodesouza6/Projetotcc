<script type="text/javascript" src="{{ asset('js/submit.js') }}"></script>
<script src="{{asset('js/payment.js')}}"></script>
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
                                        R$ {{ number_format($total_pedido, 2, ',', '.')   }}+
                                        @if(!empty($_resultado))
                                        {{$_resultado['valor']}}(frete) = 
                                        @php
                                            $totalpedido=$_resultado['valor']+$total_pedido;
                                        @endphp
                                         {{ number_format($totalpedido, 2, ',', '.') }}
                                        @else
                                        @php
                                            $totalpedido=$total_pedido;
                                        @endphp
                                        (Sem frete)
                                        @endif  </p>
                                    
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
        <input type="hidden" name="prazo" value="{{$_resultado['prazo']}}">
        <input type="hidden" name="valortotal" value="{{$totalpedido}}">
        <input type="hidden" name="checked" value="em andamento">
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
        <legend><p class="lead text-center">Endereço de Entrega</p></legend>
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
            <label for="ruaenumero">Endereço <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ruaenumero" name="ruaenumero" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="complemento">Complemento </label>
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="" >
        </div>
        <div class="form-group">
            <label for="numerotelefone">Número Telefone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="numerotelefone" name="numerotelefone" placeholder="(xx)xxxxx-xxxx" required>
        </div>
     
        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
        <input type="hidden" name="produtospedido[{{$pedido_produto}} ]" value="{{$pedido_produto}}"> 
    <input type="hidden" name="produto[{{$pedido_produto->produto_id}}]" value="{{$pedido_produto->produto_id}}" >
        <input type="hidden" name="qtd[{{$pedido_produto->qtd}}]" value="{{$pedido_produto->qtd}}" >
        
       
        @endforeach 
    </fieldset>
    <fieldset>
        <h4 class="mb-3">Escolha forma de pagamento</h4>

        <div class="custom-control custom-radio">
            <input type="radio" name="paymentMethod" class="custom-control-input" id="boleto" value="boleto" onclick="tipoPagamento('boleto')">
            <label class="custom-control-label" for="boleto">Boleto</label>
        </div>

        <div class="custom-control custom-radio">
            <input type="radio" name="paymentMethod" class="custom-control-input" id="creditCard" value="creditCard" onclick="tipoPagamento('creditCard')">
            <label class="custom-control-label" for="creditCard">Cartão de Crédito</label>
        </div>

       
        <div class="custom-control custom-radio">
            <input type="radio" name="paymentMethod" class="custom-control-input" id="eft" value="eft" onclick="tipoPagamento('eft')">
            <label class="custom-control-label" for="eft">Débito Online</label>
        </div>

        <!-- Pagamento com débito online -->
        <div class="mb-3 bankName">
            <label class="bankName">Banco</label>
            <select name="bankName" id="bankName" class="form-control select-bank-name bankName">

            </select>
        </div>

        <!-- Pagamento com cartão de crédito -->
        <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">
        <input type="hidden" name="valorParcelas" id="valorParcelas">
        <input type="hidden" name="tokenCartao" id="tokenCartao">
        <input type="hidden" name="hashCartao" id="hashCartao">
        
        <div class="mb-3 creditCard">
            <label class="creditCard">Banco</label>
            <div class="input-group">
                <input type="text"  name="numCartao" class="form-control" id="numCartao">
                <div class="input-group-prepend">
                    <span class="input-group-text bandeira-cartao creditCard">   </span>
                </div>
            </div>
            <small id="numCartao" class="form-text text-muted">
                Preencha para ver o parcelamento
            </small>
        </div>
        
        <div class="mb-3 creditCard">
            <label class="creditCard">Quantidades de Parcelas</label>
            <select name="qntParcelas" id="qntParcelas" class="form-control select-qnt-parcelas creditCard">

            </select>
        </div>

        <div class="mb-3 creditCard">
            <label class="creditCard">Nome do titular</label>
            <input type="text" name="creditCardHolderName" class="form-control" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão" >
            <small id="creditCardHolderName" class="form-text text-muted">
                Como está gravado no cartão
            </small>
        </div>

        <div class="row creditCard">
            <div class="col-md-6 mb-3 creditCard">
                <label class="creditCard">Mês de Validade</label>
                <input type="text" name="mesValidade" id="mesValidade" maxlength="2" class="form-control creditCard">
            </div>
            <div class="col-md-6 mb-3 creditCard">
                <label class="creditCard">Ano de Validade</label>
                <input type="text" name="anoValidade" id="anoValidade" maxlength="4"  class="form-control creditCard">
            </div>
        </div>

        <div class="mb-3 creditCard">                            
            <label class="creditCard">CVV do cartão</label>
            <input type="text" name="numCartao" class="form-control creditCard" id="cvvCartao" maxlength="3" >
            <small id="cvvCartao" class="form-text text-muted creditCard">
                Código de 3 digitos impresso no verso do cartão
            </small>
        </div>

        <div class="row creditCard">
            <div class="col-md-6 mb-3 creditCard">
                <label class="creditCard">CPF do dono do Cartão</label>
                <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" class="form-control creditCard">
            </div>
            <div class="col-md-6 mb-3 creditCard">
                <label class="creditCard">Data de Nascimento</label>
                <input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" class="form-control creditCard">
            </div>
        </div>

        <h4 class="mb-3 creditCard">Endereço do titular do cartão</h4>
        <div class="row creditCard">
            <div class="col-md-9 mb-3 creditCard">
                <label class="creditCard">Logradouro</label>
                <input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua" class="creditCard form-control">
            </div>                            
            <div class="col-md-3 mb-3 creditCard">
                <label class="creditCard">Número</label>
                <input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número" class="creditCard form-control">
            </div>
        </div>
        
        <div class="mb-3 creditCard">
            <label class="creditCard">Complemento</label>
            <input type="text" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento"  class="creditCard form-control">
        </div>
        
       
        
        <div class="row creditCard">
            <div class="col-md-5 mb-3 creditCard">
                <label class="creditCard">Bairro</label>
                <input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro"  class="creditCard form-control">
            </div>
            <div class="col-md-5 mb-3 creditCard">
                <label class="creditCard">Cidade</label>
                <input type="text" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade"  class="creditCard form-control">
            </div>
            <div class="col-md-2 mb-3 creditCard">
                <label class="creditCard">Estado</label>
                <select name="billingAddressState" class="custom-select d-block w-100 creditCard" id="billingAddressState">
                    <option value="">Selecione</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP" selected>SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="creditCard">CEP</label>
            <input type="text" name="billingAddressPostalCode" class="form-control creditCard" id="billingAddressPostalCode" placeholder="CEP sem traço" >
        </div>
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
