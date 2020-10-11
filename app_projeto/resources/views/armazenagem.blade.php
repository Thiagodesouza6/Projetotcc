<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		
		
	  <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
   
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
   
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body> 
            @include('inc.header')<br><br>
<br>
<div class="container paineis my-5">
        <div class="row">
                <div class="col-2">
               <nav id="navbarVertical " class="navbar  navbar-dark ">
                   <nav class="nav nav-pills  flex-column">
                        <ul class="nav nav-pills    "id="pills-nav"role="tablist">
                                <li class="nav-item px-2 " >
                                        <a class="nav-link active" id="nav-pills-01" data-toggle="pill"href="#nav-item-01">Link</a>
                                      </li>
                          
                                      <li class="nav-item px-2  ">
                                            <a class="nav-link"id="nav-pills-01" data-toggle="pill" href="#nav-item-02">Link</a>
                                          </li>
                                          <li class="nav-item  px-2 ">
                                                <a class="nav-link" id="nav-pills-01" data-toggle="pill"href="#nav-item-03">Link</a>
                                              </li>
                        </ul>
                   </nav>
                   
                  
               </nav>
              
    
</div>


<div class="col-sm">
        <section class="painel novidades"><br>
          
           
                    
                    
           
          <!--  <div class="card-group ">
                    @foreach ($produtos as $p)
                    <div class="card inner my-2">
                        <a href="/produtos/{{$p->id}}"><img class="card-img-top" src="../storage/{{$p->image}}" alt="Card image cap">
                      <div class="card-body text-center">
                        <h5 class="card-title lead">{{$p->nome}}</h5>
                        <p class="card-text lead">{{$p->valor}}</p>
                            </a>
                      </div>
                    </div>
                    @endforeach
                    
                  </div> -->
    <ol>
          
      
        @foreach ($produtos as $p)      <li>
                <div class="card inner my-2">
                        <a href="/produtos/{{$p->id}}"><img class="card-img-top" src="../storage/{{$p->image}}" alt="Card image cap">
                      <div class="card-body text-center">
                        <h5 class="card-title lead">{{$p->nome}}</h5>
                        <p class="lead display-5">{{$p->valor}}</p>
                            </a>
                      </div>
                    </div>
                      </li> @endforeach
        <!--
              <li>
            
            <a href="{{ url('/produtos') }}">
                <figure>
                    <img src="../storage/{{$p->image}}">
                    <figcaption>{{$p->nome}} por R$ {{$p->valor}}</figcaption>
                </figure>
            </a>
        </li>
       
            <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura3.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura4.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produto.html">
                <figure>
                    <img src="img/produtos/miniatura5.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura6.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura10.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura11.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura13.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
    </ol>
    <button type="button">Mostrar mais</button>
    </section>
    
    <section class="painel mais-vendidos">
    <h2 class="text-center">Mais Vendidos</h2>
    <ol>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura7.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura8.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura9.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura10.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura11.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura12.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura13.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura14.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
        <li>
            <a href="produtos.html">
                <figure>
                    <img src="img/produtos/miniatura15.png">
                    <figcaption>Fuzz Cardigan por R$ 129,90</figcaption>
                </figure>
            </a>
        </li>
    </ol>
    <button type="button">Mostrar mais</button>-->
    </section>
</div>
</div>
</div>

<br>

            
@include('inc.footer')
		
    </body>
</html>