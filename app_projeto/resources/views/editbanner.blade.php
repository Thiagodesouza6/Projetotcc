
@extends('layouts.app')

@section('content')<br><br>
	<div class="container">
    <h1 class="mt-2">Alterar informações</h1>
    <form action="/editbanner" method="post" class="mt-2" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{{csrf_token()}}}" >
        <div class="form-group">
           
                <input type="hidden" id="id" name="id" class="form-control" value="{{$banner->id}}">
            </div>
     
            <div class="form-group">
                <label for="banner1">Imagem primeiro banner: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="banner1" id="banner1" required ><img src="../storage/{{$banner->banner1}}" width="80px" alt="">
              </div>
              <div class="form-group">
                <label for="banner2">Imagem segundo banner: </label>
                <input type="file" class="form-control" name="banner2" id="banner2"  ><img src="../storage/{{$banner->banner2}}" width="80px" alt="">
              </div>
              <div class="form-group">
                <label for="banner3">Imagem terceiro banner: </label>
                <input type="file" class="form-control" name="banner3" id="banner3"  ><img src="../storage/{{$banner->banner3}}" width="80px" alt="">
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