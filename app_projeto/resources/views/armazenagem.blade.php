
@extends('layouts.app')

@section('content')<br><br>
<br>
<div class="container paineis my-5">
        <div class="row">
                <div class="col-2">
               <nav id="navbarVertical " class="navbar  navbar-dark ">
                   <nav class="nav nav-pills  flex-column">
                        <ul class="nav nav-pills    "id="pills-nav"role="tablist">
                               <!-- <li class="nav-item px-2 " >
                                        <a class="nav-link active" id="nav-pills-01" data-toggle="pill"href="#nav-item-01">Link</a>
                                      </li>
                          
                                      <li class="nav-item px-2  ">
                                            <a class="nav-link"id="nav-pills-01" data-toggle="pill" href="#nav-item-02">Link</a>
                                          </li>
                                          <li class="nav-item  px-2 ">
                                                <a class="nav-link" id="nav-pills-01" data-toggle="pill"href="#nav-item-03">Link</a>
                                              </li>-->
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
          
      
        @forelse ($produtos as $p)  @if ($p->quantidade==0)
        <li>
            <div class="card inner my-2 soldout">
                    <a href="/produtos/{{$p->id}}"><img class="card-img-top" src="../storage/{{$p->image}}" alt="Card image cap">
                  <div class="card-body text-center">
                    <h5 class="card-title lead">{{$p->nome}}</h5>
                    <p class="lead display-5">Esgotado
                    
                        </a>
                       
                  </div>
                </div>
                  </li> 
        @else
        <li>
            <div class="card inner my-2">
                    <a href="/produtos/{{$p->id}}"><img class="card-img-top" src="../storage/{{$p->image}}" alt="Card image cap">
                  <div class="card-body text-center">
                    <h5 class="card-title lead">{{$p->nome}}</h5>
                    <p class="lead display-5">R$ {{ number_format($p->valor, 2, ',', '.')   }}
                    </p>
                    
                        </a>
                       
                  </div>
                </div>
                  </li> 
        @endif
            
           
        @empty
            <h1>  <div class="alert alert-danger">Não há produtos</div></h1>
      
                      @endforelse

        <!--
       
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
@endsection
    @section('header')
    @include('inc.header')
    @endsection
    @section('footer')
    @include('inc.footer')
    @endsection