<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

</head>
<body>
        @include('inc.header')<br><br>
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
</body>
<html>