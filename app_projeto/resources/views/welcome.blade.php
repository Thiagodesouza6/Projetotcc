
@extends('layouts.app')

@section('content')
			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
				  <div class="carousel-item active">
					<img class="d-block w-100" src="img/banner.jpg" height="500"alt="First slide">
				  </div>
				  <div class="carousel-item">
					<img class="d-block w-100" src="img/banner.jpg"height="500" alt="Second slide">
				  </div>
				  <div class="carousel-item">
					<img class="d-block w-100" src="img/banner.jpg"height="500" alt="Third slide">
				  </div>
				</div>
				
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			<!--<div class="container destaque">
				<section class="busca">
				<h2>Busca</h2>
				<form>
					<input type="search">
					<button>Buscar</button>
				</form>
		  </section>

			<section class="menu-departamentos">
				<h2>Departamentos</h2>
				<nav>
					<ul>
						<li><a href="#">Blusas e Camisas</a></li>
						<li><a href="#">Calças</a></li>
						<li><a href="#">Saias</a></li>
						<li><a href="#">Vestidos</a></li>
						<li><a href="#">Sapatos</a></li>
						<li><a href="#">Bolsas e Carteiras</a></li>
						<li><a href="#">Acessórios</a></li>
					</ul>
				</nav>
			</section>
            
            <section class="banner-destaque">
                <figure>
					<img src="img/destaque-home.png" 
					alt="Promoção: Big City Night">    
                </figure>
            </section>
		</div>-->	
		<div class=" paineis my-5">
				<section class="painel novidades  "><br>
					<p class="display-4 text-center my-2">Novidades</p>
					<br>
					<div class="slider owl-carousel ">
			
	
							@foreach($produtos->where('tag', 'Novidade') as $produto)	

							<div class="card opacitytransform"><a href="/produtos/{{$produto->id}}">
									<div class="img">
										<img src="../storage/{{$produto->image}}" ></div>
										<div class="content">
										<div class="title">
											{{$produto->nome}}
										</div>
										
							
								<p class="text-center lead">
									{{$produto->valor}}</p>
								</div>
								</a>
							
							</div>
				  @endforeach
	  
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
		
						<div class="card opacitytransform">
							<a href="/produtos/{{$produto->id}}">
								<div class="img">
									<img src="../storage/{{$produto->image}}" ></div>
									<div class="content">
									<div class="title">
										{{$produto->nome}}</div>
									<p class="text-center lead">
										{{$produto->valor}}
									</p>
									</div>
							</a>
						
						</div>
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

				<div class="card opacitytransform">
					<a href="/produtos/{{$produto->id}}">
						<div class="img">
							<img src="../storage/{{$produto->image}}" ></div>
							<div class="content">
							<div class="title">
								{{$produto->nome}}</div>
							<p class="text-center lead">
								{{$produto->valor}}
							</p>
							</div>
					</a>
				
				</div>
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
		