
@extends('layouts.app')

@section('content')<br><br>
@if (  Auth::user()->id=='1')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br><br>
                        <a href="/produtos/inserir/{id}"><button class="btn btn-success">Inserir Produtos</button></a>
                        <a href="{{ url('/listagem') }}"><button class="btn btn-success">Listagem de Produtos</button></a>
                       
                      
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
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="/carrinho"><button class="btn btn-secondary">Pedidos</button></a> 
                      
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
