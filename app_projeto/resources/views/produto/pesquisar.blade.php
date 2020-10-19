
@extends('layouts.app')

@section('content')<br><br>
	<div class="container">
		@if(count($produtos) == 0)
            <div class="alert alert-danger mt-2">Nenhum produto encontrado com essa descrição!</div>
        @else
            <table class="table mt-2 text-center">
                    <tr>
                            <th></th>
                            <th class="text-left">Nome</th>
                           
                            <th>Valor</th>
                        
                          
                        </tr>
                @foreach ($produtos as $p)
                    <tr>
                        <td> <a href="/produtos/{{$p->id}}"><img src="../storage/{{$p->image}}" height="200"></td></a>
                     
                        <td class="text-left">{{$p->nome}}</td>
                       
                        <td>{{$p->valor}}</td>
                       
                  
                    </tr>
                @endforeach
            </table>
            
        @endif
		
	
		@if(!empty($mensagem))
            <div class="alert alert-success mt-2">{{$mensagem}}</div>
        @endif
	
       
    </div>
    @endsection
    @section('header')
    @include('inc.header')
    @endsection
    @section('footer')
    @include('inc.footer')
    @endsection