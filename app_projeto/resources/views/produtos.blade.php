<head>
        <link href="{{ asset('css/produto.css') }}" rel="stylesheet">
</head>
@extends('layouts.app')

@section('content')<br><br>
        <div class="row container">
  <div class="col-sm-5 "> <img  src="../storage/{{$produto->image}}" class="img-fluid formimagem img-thumbnail mb"></div>
  <div class="col-sm-6 detalhes ">  <h2 class="text-center ">{{$produto->nome}}</h2>
     <p class="text-center ">{{$produto->valor}}R$</p>
   
    @if (Auth::check())
    <form action="{{ route('carrinho.adicionar') }}" method="POST">   
        <br>
        <div class="d-flex justify-content-center">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <button class="btn btn-success" >Comprar</button>  
     
    </div>
    </form>
        @else
        <form action="/login">
            <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success mt-2" value="Comprar"> </div>
        </form>
   
        @endif
        
 
   
        <h2 class="text-center ">Detalhes do produto</h2>
        <p class="text-center ">{{$produto->descricao}}
        </p><br>
        <table style="margin-left:auto;margin-right:auto;">
            <thead>
                <tr>
                    <th>Característica</th>
                    <th>Detalhe</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Categoria</td>
                    <td>{{$produto->categoria}}</td>
                </tr>
                <tr>
                    <td>Dimensões</td>
                    <td>{{$produto->dimensoes}}</td>
                </tr>
                <tr>
                    <td>Cores</td>
                    <td>{{$produto->cor}}</td>
                </tr>
                <tr>
                    <td>Capacidade</td>
                    <td>{{$produto->capacidade}}</td>
                </tr>
            </tbody>
        </table>


</div>
    

    
        </div>
    </div>
    <br>
    @endsection
    @section('header')
    @include('inc.header')
    @endsection
    @section('footer')
    @include('inc.footer')
    @endsection