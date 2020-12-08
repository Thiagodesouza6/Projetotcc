
@extends('layouts.app')

@section('content')<br><br>
@if (  Auth::user()->id=='1')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br><br>
                       
                       
                        <a href="{{ url('/listagem') }}"><button class="btn btn-success">Listagem de Produtos</button></a>
                        @foreach ($banner as $b)
                        <a href="/editbanner{{$b->id}}"><button class="btn btn-secondary">Editar banner</button></a> 
                        @endforeach
                        @foreach ($contatos as $c)
                        <a href="/editcontact{{$c->id}}"><button class="btn btn-secondary">Editar Dados</button></a> 
                        
                      @endforeach
                      <a href="{{route('pedido.exibirpedidos')}}"><button class="btn btn-secondary">Pedidos</button></a> <br><br>
                      <a href="{{route('pedido.pedidosconcluidos')}}"><button class="btn btn-secondary">Pedidos concluídos</button></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{route('pedido.exibirmeuspedidos')}}"><button class="btn btn-secondary">Meus Pedidos</button></a> 
                        <a href="{{route('pedido.historico')}}"><button class="btn btn-secondary">Histórico de compras</button></a> 
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<br><br><br><br><br><br><br><br>

@endsection
@section('header')
@include('inc.header')
@endsection
@section('footer')

@include('inc.footer')

@endsection
