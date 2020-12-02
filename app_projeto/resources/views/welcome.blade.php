@php
	use App\banner;
	$banner = banner::all();
@endphp
@extends('layouts.app')

@section('content')
		
				
			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
						@forelse ($banner as $b)
				  <div class="carousel-item active">
					<img class="d-block w-100 img-fluid" src="../storage/{{$b->banner1}}" height="560">
				  </div>
				  @if (empty($b->banner2))
				  <div class="carousel-item">
						<img class="d-block w-100 img-fluid" src="../storage/{{$b->banner1}}" height="560"> 
					  </div> 
				 
				  @else
				  <div class="carousel-item">
						<img class="d-block w-100 img-fluid" src="../storage/{{$b->banner2}}"height="560" >
					  </div>   
				  @endif
				  @if (empty($b->banner3))
				  <div class="carousel-item">
						<img class="d-block w-100 img-fluid" src="../storage/{{$b->banner1}}" height="560"> 
					  </div> 
				
				  @else
				 
					  <div class="carousel-item">
							<img class="d-block w-100 img-fluid" src="../storage/{{$b->banner3}}"height="560" >
						  </div>
				  @endif
				  
				</div>
				@empty
				
				@endforelse
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			 
		<div class=" paineis my-5">
				<section class="painel novidades  "><br>
					<p class="display-4 text-center my-2">Novidades</p>
					<br>
					<div class="slider owl-carousel ">
			
	
							@forelse($produtos->where('tag', 'Novidade') as $produto)	
							@if ($produto->quantidade==0)
							<div class="card opacitytransform soldout">
								<a href="/produtos/{{$produto->id}}">
									<div class="img">
										<img src="../storage/{{$produto->image}}" ></div>
										<div class="content">
										<div class="title">
											{{$produto->nome}}</div>
										<p class="text-center lead">
											R$ {{ number_format($produto->valor, 2, ',', '.')   }}
										</p>
										
										<form action="{{ route('carrinho.adicionar') }}" method="POST">   
											<br>
											<div class="d-flex justify-content-center">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{ $produto->id }}">
													<p class="text-center">Esgotado</p>  
										 
										</div>
										</form>
											
											
										</div>
								</a>
								
							
							</div>
							@else
							<div class="card opacitytransform"><a href="/produtos/{{$produto->id}}">
									<div class="img">
										<img src="../storage/{{$produto->image}}" ></div>
										<div class="content">
										<div class="title">
											{{$produto->nome}}
										</div>
										
							
								<p class="text-center lead">
									R$ {{ number_format($produto->valor, 2, ',', '.')   }}</p>
								
									<form action="{{ route('carrinho.adicionar') }}" method="POST">   
										<br>
										<div class="d-flex justify-content-center">
												{{ csrf_field() }}
												<input type="hidden" name="id" value="{{ $produto->id }}">
												<button class="btn btn-success" >Adicionar ao carrinho</button>  
									 
									</div>
									</form>
									
								</div>
								</a>
							
							</div>
							@endif
							@empty
							<h1>  <div class="alert alert-danger">Não há produtos</div></h1>
				  @endforelse
	  
	  </div>
	  <br><br>
	  </div>
	  <script>
			$(".slider").owlCarousel({
			  loop: true,
			  autoplay: true,
			  autoplayTimeout: 2000, //2000ms = 2s;
			  autoplayHoverPause: true,
			});
		  </script>
		  	<br>	
			 
			</section>
			<br>  
			<div class=" paineis my-5">
					<section class="painel  novidades ">
						<p class="display-4 text-center py-4">Ofertas</p>
						<div class="slider owl-carousel ">
					
						@forelse($produtos->where('tag', 'Promoção') as $produto)	
						@if ($produto->quantidade==0)
						<div class="card opacitytransform soldout">
							<a href="/produtos/{{$produto->id}}">
								<div class="img soldout">
									<img src="../storage/{{$produto->image}}" ></div>
									<div class="content">
									<div class="title">
										{{$produto->nome}}</div>
									<p class="text-center lead">
										R$ {{ number_format($produto->valor, 2, ',', '.')   }}
									</p>
									
									<form action="{{ route('carrinho.adicionar') }}" method="POST">   
										<br>
										<div class="d-flex justify-content-center">
												{{ csrf_field() }}
												<input type="hidden" name="id" value="{{ $produto->id }}">
												<p class="text-center">Esgotado</p>  
									 
									</div>
									</form>
										
										
									</div>
							</a>
							
						
						</div>
						@else
						<div class="card opacitytransform">
							<a href="/produtos/{{$produto->id}}">
								<div class="img">
									<img src="../storage/{{$produto->image}}" ></div>
									<div class="content">
									<div class="title">
										{{$produto->nome}}</div>
									<p class="text-center lead">
										R$ {{ number_format($produto->valor, 2, ',', '.')   }}
									</p>
									
							<form action="{{ route('carrinho.adicionar') }}" method="POST">   
								<br>
								<div class="d-flex justify-content-center">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{ $produto->id }}">
										<button class="btn btn-success" >Adicionar ao carrinho</button>  
							 
							</div>
							</form>
								
									</div>
							</a>
						
						</div>
						@endif
						@empty
					<h1>  <div class="alert alert-danger">Não há produtos</div></h1>
			  @endforelse
			  </div>
			  <br><br>
			</div>
			 
			  <script>
					$(".slider").owlCarousel({
					  loop: true,
					  autoplay: true,
					  autoplayTimeout: 2000, //2000ms = 2s;
					  autoplayHoverPause: true,
					});
				  </script>
					  <br>
					</section>
					<br>
			<div class=" paineis my-5">
			<section class="painel mais-vendidos ">
				<p class="display-4 text-center py-4">Mais Vendidos</p>
				<div class="slider owl-carousel  ">
			
				@forelse($produtos->where('tag', 'Mais Vendidos') as $produto)	
				@if ($produto->quantidade==0)
				<div class="card opacitytransform soldout">
					<a href="/produtos/{{$produto->id}}">
						<div class="img">
							<img src="../storage/{{$produto->image}}" ></div>
							<div class="content">
							<div class="title">
								{{$produto->nome}}</div>
							<p class="text-center lead">
								R$ {{ number_format($produto->valor, 2, ',', '.')   }}
							</p>
							
							<form action="{{ route('carrinho.adicionar') }}" method="POST">   
								<br>
								<div class="d-flex justify-content-center">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{ $produto->id }}">
										<p class="text-center">Esgotado</p>  
							 
							</div>
							</form>
								
								
							</div>
					</a>
					
				
				</div>
				@else
				<div class="card opacitytransform">
					<a href="/produtos/{{$produto->id}}">
						<div class="img">
							<img src="../storage/{{$produto->image}}" ></div>
							<div class="content">
							<div class="title">
								{{$produto->nome}}</div>
							<p class="text-center lead">
								R$ {{ number_format($produto->valor, 2, ',', '.')   }}
							</p>
							
							<form action="{{ route('carrinho.adicionar') }}" method="POST">   
								<br>
								<div class="d-flex justify-content-center">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{ $produto->id }}">
										<button class="btn btn-success" >Adicionar ao carrinho</button>  
							 
							</div>
							</form>
								
								
							</div>
					</a>
					
				
				</div>
				@endif
				@empty
            <h1>  <div class="alert alert-danger">Não há produtos</div></h1>
	  @endforelse
	  </div>
	  <br><br>
	</div>
	 
	  <script>
			$(".slider").owlCarousel({
			  loop: true,
			  autoplay: true,
			  autoplayTimeout: 2000, //2000ms = 2s;
			  autoplayHoverPause: true,
			});
		  </script>
		  	<br>
			</section>
		
		
		@endsection
		@section('header')
		@include('inc.header')
		@endsection
		@section('footer')
		@include('inc.footer')
		@endsection
		