
<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
<title> Alterar produtos </title>
	<meta charset = "utf-8">
	<link href="../../css/bootstrap.css" rel="stylesheet">
</head>
	<div class="container">
    <h1 class="mt-2">Alterar produto</h1>
    <form action="/produtos/alterar" method="post" class="mt-2">
        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
        <div class="form-group">
            <label for="id">ID: <span class="text-danger">*</span></label>
            <input type="text" id="id" name="id" class="form-control" required readonly value="{{$produto->id}}">
        </div>
        <div class="form-group">
                <label for="nome">Nome: <span class="text-danger">*</span></label>
                <input type="text" id="nome" name="nome" class="form-control"autofocus required value="{{$produto->nome}}"> 
            </div>
        <div class="form-group">
            <label for="descricao">Descrição: <span class="text-danger">*</span></label>
            <input type="text" id="descricao" name="descricao" class="form-control" required value="{{$produto->descricao}}">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade: <span class="text-danger">*</span></label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required value="{{$produto->quantidade}}">
        </div>
        <div class="form-group">
            <label for="valor">Valor: <span class="text-danger">*</span></label>
            <input type="number" id="valor" name="valor" class="form-control" required value="{{$produto->valor}}">
        </div>
        
           
       
    <div class="form-group">
              <label for="cor">Cor:</label>
 <select id="cor" name="cor" >
     <option value="Verde">Verde</option>
    <option value="Rosa">Rosa</option>
    <option value="Azul">Azul</option>
    <option value="Preto">Preto</option>
</select>
    </div>
                  
  
    <div class="form-group">
        <label for="categoria">Categoria:<span class="text-danger">*</span> </label>
        <input type="text" id="categoria" name="categoria" class="form-control"required value="{{$produto->categoria}}">
    </div>
    <div class="form-group">
            <label for="dimensoes">Dimensões: <span class="text-danger">*</span></label>
            <input type="text" id="dimensoes" name="dimensoes" class="form-control" required value="{{$produto->dimensoes}}">
        </div>
        <div class="form-group">
                <label for="capacidade">Capacidade: <span class="text-danger">*</span></label>
                <input type="text" id="capacidade" name="capacidade" class="form-control" required value="{{$produto->capacidade}}">
            </div>
            <div class="form-group">
                    <label for="image">Imagem do produto: <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="image" value="" required value="{{$produto->image}}">
                  </div>
        <div>Os campos marcados com <span class="text-danger">*</span> não podem estar em branco.</div>
        <input type="submit" class="btn btn-success mt-2" value="Alterar">
    </form>
</div>
	</div>
</body>
</html>