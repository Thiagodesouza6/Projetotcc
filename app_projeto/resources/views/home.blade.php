
@extends('layouts.app')

@section('content')<br><br>
@if (  Auth::user()->email=='serginhodavila@hotmail.com')
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
                      
                        {{ __('You are logged in! ' ) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
