<?php

?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Mirror Fashion</title>
        <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
   
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet"> 
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	 
    </head>
    <body >@include('inc.header')
			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
				  <div class="carousel-item active">
					<img class="d-block w-100" src="img/destaque-home.png" height="500"alt="First slide">
				  </div>
				  <div class="carousel-item">
					<img class="d-block w-100" src="img/produtos/miniatura2.png"height="500" alt="Second slide">
				  </div>
				  <div class="carousel-item">
					<img class="d-block w-100" src="img/produtos/miniatura3.png"height="500" alt="Third slide">
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
				<section class="painel novidades"><br>
					<h2 class="display-4 text-center lead">Novidades</h2>
					<br>
					<div class="slider owl-carousel ">
			
				
			<div class="card opacitytransform" height="250" ><a href="{{ url('/produtos') }}">
			  <div class="img">
	  <img src="img/produtos/miniatura1.png" alt="First slide"></div>
	  <div class="content ">
	  <div class="title">
	  Eliana Maia</div> 
	  <p class="text-center">
	  Fuzz Cardigan por R$ 129,90</p></a>
	  </div>
	  </div>
	  <div class="card opacitytransform"><a href="{{ url('/produtos') }}">
			  <div class="img">
	  <img src="img/produtos/miniatura3.png"  alt="Second slide"></div>
	  <div class="content">
	  <div class="title">
	  Eliana Maia</div> 
	  <p class="text-center">
	  Fuzz Cardigan por R$ 129,90</p></a>
	  </div>
	  </div>
	  <div class="card opacitytransform"><a href="{{ url('/produtos') }}">
			  <div class="img">
	  <img src="img/produtos/miniatura4.png"alt="Third slide"></div>
	  <div class="content">
	  <div class="title">
	  Eliana Maia</div> 
	  <p class="text-center">
	  Fuzz Cardigan por R$ 129,90</p></a>
	
				
	  </div>
	  </div>
	  <div class="card opacitytransform"><a href="{{ url('/produtos') }}">
			  <div class="img">
	  <img src="img/produtos/miniatura2.png" alt=""></div>
	  <div class="content ">
	  <div class="title">
	  Eliana Maia</div> 
	  <p class="text-center lead">
	  Fuzz Cardigan por R$ 129,90</p></a>
	
				
	  </div>
	  
	  </div>
	  
	  </div>
	  <script>
			$(".slider").owlCarousel({
			  loop: true,
			  autoplay: true,
			  autoplayTimeout: 2000, //2000ms = 2s;
			  autoplayHoverPause: true,
			});
		  </script>
		  	<br><br><br>
			 
			</section>
			<br> <br> <br> <br> <br> <br>
			<section class="painel mais-vendidos">
				<h2>Mais Vendidos</h2>
				<div class="slider owl-carousel ">
			
				
			<div class="card opacitytransform" height="250" ><a href="produtos.php">
			  <div class="img">
	  <img src="img/produtos/miniatura1.png" alt="First slide"></div>
	  <div class="content ">
				<div class="title">
	  Briana Tozour</div>
	  
	  <p class="text-center">
	  Lorem as cumque.</p>
	 </a>
	  </div>
	  </div>
	  <div class="card opacitytransform"><a href="produtos.php">
			  <div class="img">
	  <img src="img/produtos/miniatura3.png"  alt="Second slide"></div>
	  <div class="content">
				<div class="title">
	  Pricilla Preez</div>
	
	  <p class="text-center lead">
	  Lorem unde voluptas cumque.</p>
	</a>
	  </div>
	  </div>
	  <div class="card opacitytransform"><a href="produtos.php">
			  <div class="img">
	  <img src="img/produtos/miniatura4.png"alt="Third slide"></div>
	  <div class="content">
				<div class="title">
	  Eliana Maia</div> 
	  <p class="text-center">
	  Fuzz Cardigan por R$ 129,90</p></a>
	
				
	  </div>
	  </div>
	  <div class="card opacitytransform"><a href="produtos.php">
			  <div class="img">
	  <img src="img/produtos/miniatura2.png" alt=""></div>
	  <div class="content">
				<div class="title">
	  Eliana Maia</div> 
	  <p class="text-center">
	  Fuzz Cardigan por R$ 129,90</p></a>
	
				
	  </div>
	  </div>
	 	
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
		</div>
		
<footer>@include('inc.footer')</footer>
		
    </body>
</html>