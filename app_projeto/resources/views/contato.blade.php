@extends('layouts.app')

@section('content')<br><br>
	<div class="container">
    <h1 class="mt-2">Alterar informações</h1>
    <form action="/editcontact" method="post" class="mt-2">
        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
        <div class="form-group">
           
                <input type="hidden" id="id" name="id" class="form-control" value="{{$contatos->id}}">
            </div>
        <div class="form-group">
            <label for="telefone">Telefone: </label>
            <input type="text" id="telefone" name="telefone" class="form-control" value="{{$contatos->telefone}}">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" id="email" name="email" class="form-control" value="{{$contatos->email}}">
        </div>
        <div class="form-group">
            <label for="linkwpp">Número telefone(whatsapp): </label>
            <input type="text" id="linkwpp" name="linkwpp" class="form-control"  value="{{$contatos->linkwpp}}">
        </div>
        <div class="form-group">
            <label for="linkfacebook">Cole a url da página no facebook: </label>
            <input type="text" id="linkfacebook" name="linkfacebook" class="form-control"  value="{{$contatos->linkfacebook}}">
        </div>
        <div class="form-group">
                <label for="linkinstagram">Cole a url da página no instagram: </label>
                <input type="text" id="linkinstagram" name="linkinstagram" class="form-control"  value="{{$contatos->linkinstagram}}">
            </div>
    
      
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