
@extends('layouts.app')

@section('content')<br><br>
    
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
                                 $total_pedido = 0;
                           @endphp
                                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                                    
                                       
                                        @php
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
                                        R$ {{ number_format($total_pedido, 2, ',', '.')   }} </p>
                                    
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
                                    <form> 
       
    <fieldset>
           
       
        <legend><p class="lead text-center">Dados pessoais</p></legend>
        @foreach($users as $user)	
        
        
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$user->name}}"autofocus>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group ">
                <div class="input-group-pretend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
        </div>
      
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
    <button type="submit" class="btn btn-primary">
        <span class="oi oi-tumb-up"></span>
        Confirmar Pedido
    </button>
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
