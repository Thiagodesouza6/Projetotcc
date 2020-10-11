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
		
            <table class="table mt-2 text-center">
                <tr>
                    <th>Id</th>
                    <th class="text-left">Nome</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>imagem</th>
                    <th>Cor</th>
                    <th>Capacidade</th>
                    <th>Categoria</th>
                    <th>Dimensões</th>
                </tr>
                @foreach ($produtos as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td class="text-left">{{$p->nome}}</td>
                        <td>{{$p->quantidade}}</td>
                        <td>{{$p->valor}}</td>
                       <td> <img src="../storage/{{$p->image}}" height="100">
                        <td>{{$p->cor}}</td>
                        <td>{{$p->capacidade}}</td>
                        <td>{{$p->categoria}}</td>
                        <td>{{$p->dimensoes}}</td>
                        <td><a href="/produtos/excluir/{{$p->id}}"><button class="btn btn-danger">Excluir</button></a></td>
                        <td><a href="/produtos/alterar/{{ $p->id}}"><button class="btn btn-warning">Alterar</button></a></td>
                    </tr>
                @endforeach
            </table>
            @if(!empty($mensagem))
            <div class="alert alert-success mt-2">{{$mensagem}}</div>
        @endif
    </div>
</body>
<html>