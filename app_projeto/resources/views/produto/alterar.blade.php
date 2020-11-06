@extends('layouts.app')

@section('content')<br><br>
	<div class="container">
    <h1 class="mt-2">Alterar produto</h1>
    <form action="/produtos/alterar" method="post" class="mt-2"enctype="multipart/form-data">
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
 <select id="cor" name="cor" selected>
     <option value="Verde">Verde</option>
    <option value="Rosa">Rosa</option>
    <option value="Azul">Azul</option>
    <option value="Preto">Preto</option>
</select>
    </div>
                  
    <div class="form-group">
        <label for="categoria">Categoria: </label>
<select id="categoria" name="categoria" value="{{$produto->categoria}}">
<option value="Armazenar">Armazenar</option>
<option value="Freezer">Freezer</option>
<option value="Garrafa">Garrafa</option>
<option value="Micro-Ondas">Micro-ondas</option>

</select>
</div>
<div class="form-group">
    <label for="tag">Tag:</label>
<select id="tag" name="tag" value="{{$produto->tag}}">
<option value="Nenhum">Nenhum</option>
<option value="Novidade">Novidade</option>
<option value="Mais Vendidos">Mais Vendidos</option>
<option value="Promoção">Promoção</option>

</select>
</div>
   
        <div class="form-group">
            <label for="peso">Peso(Kg): <span class="text-danger">*</span></label>
            <input type="text" id="peso" name="peso" class="form-control"required value="{{$produto->peso}}">
        </div>
        <div class="form-group">
            <label for="altura">Altura(cm): <span class="text-danger">*</span></label>
            <input type="text" id="altura" name="altura" class="form-control" required value="{{$produto->altura}}">
        </div>
        <div class="form-group">
            <label for="comprimento">Comprimento(cm): <span class="text-danger">*</span></label>
            <input type="text" id="comprimento" name="comprimento" class="form-control" required value="{{$produto->comprimento}}">
        </div>
        <div class="form-group">
            <label for="largura">Largura(cm): <span class="text-danger">*</span></label>
            <input type="text" id="largura" name="largura" class="form-control" required value="{{$produto->largura}}">
        </div>
        <div class="form-group">
                <label for="capacidade">Capacidade: <span class="text-danger">*</span></label>
                <input type="text" id="capacidade" name="capacidade" class="form-control" required value="{{$produto->capacidade}}">
            </div>
            <div class="form-group">
                    <label for="image">Imagem do produto: <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="image" value="{{$produto->image}}"required >
                  </div>
        <div>Os campos marcados com <span class="text-danger">*</span> não podem estar em branco.</div>
        <input type="submit" class="btn btn-success mt-2" value="Alterar">
    </form>
</div>
	</div>
    <br><br>
    @endsection
    @section('header')
    @include('inc.header')
    @endsection
    @section('footer')
    @include('inc.footer')
    @endsection