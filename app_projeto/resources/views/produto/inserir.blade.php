@extends('layouts.app')

@section('content')<br><br>
    <div class="container">
        <h1 class="mt-2">Inserir produto</h1>
		 @if(!empty($mensagem))
            <div class="alert alert-success">Produto inserido com sucesso!</div>
        @endif
        <form action="/produtos/inserir" method="post" class="mt-2" enctype="multipart/form-data">
	    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
            <div class="form-group">
                    <div class="form-group">
                            <label for="nome">Nome: <span class="text-danger">*</span></label>
                            <input type="text" id="nome" name="nome" class="form-control"autofocus required> 
                        </div>
                <label for="descricao">Descrição: <span class="text-danger">*</span></label>
                <input type="text" id="descricao" name="descricao" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade: <span class="text-danger">*</span></label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor: <span class="text-danger">*</span></label>
                <input type="number" id="valor" name="valor" class="form-control"  step="any" required>
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
                <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" >
        <option value="Armazenar">Armazenar</option>
        <option value="Freezer">Freezer</option>
        <option value="Garrafa">Garrafa</option>
        <option value="Micro-Ondas">Micro-ondas</option>
        
        </select>
        </div>
        <div class="form-group">
            <label for="tag">Tag: </label>
        <select id="tag" name="tag">
        <option value="Nenhum">Nenhum</option>
        <option value="Novidade">Novidade</option>
        <option value="Mais Vendidos">Mais Vendidos</option>
        <option value="Promoção">Promoção</option>
        
        </select>
        </div>
            <div class="form-group">
                    <label for="dimensoes">Dimensões: <span class="text-danger">*</span></label>
                    <input type="text" id="dimensoes" name="dimensoes" class="form-control" placeholder="comprimento x largura x altura (cm)"required>
                </div>
                <div class="form-group">
                        <label for="capacidade">Capacidade: <span class="text-danger">*</span></label>
                        <input type="text" id="capacidade" name="capacidade" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label for="image">Imagem do produto: <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" value="" required>
                          </div>
            <div>Os campos marcados com <span class="text-danger">*</span> não podem estar em branco.</div>
            <input type="submit" class="btn btn-success mt-2" value="Inserir">
        </form>
    </div><br><br>
    @endsection
    @section('header')
    @include('inc.header')
    @endsection
    @section('footer')
    @include('inc.footer')
    @endsection