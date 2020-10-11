
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produto</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/produto.css') }}" rel="stylesheet">
    
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   
</head>
<body>
        @include('inc.header')<br><br><br><br>
        <div class="row container">
  <div class="col-sm-5 "> <img  src="../storage/{{$produto->image}}" class="formimagem"></div>
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
                    <td>Modelo</td>
                    <td>Cardigã 7845</td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>Algodão e poliester</td>
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
    <footer>
        <div class="container">
            <img src="../img/tupper.png" height="100px"alt="Logo Mirror Fashion"/>

            <ul class="social">
                <li><a href="http://facebook.com/687487">Facebook</a></li>
                <li><a href="http://twitter.com/748949">Twitter</a></li>
        
            </ul>
        </div>
  </footer>
</body>
</html>
