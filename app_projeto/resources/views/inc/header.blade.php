
   
    

  <!--     
        <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/tupper.png') }}"width="200px" >
                  </a>
                
            </ul>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
               
                    
     
                    <div class="input-group margem ">
                        <form action="/produtos/pesquisar" method="post" class="form-inline ">
                          <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                        
                     
                          <input type="text" class="form-control" placeholder="Digite o que você procura"  id="nome" name="nome" >
                          <button class="btn btn-light" type="submit" value="Pesquisar">
                            <i class="fa fa-search"></i>
                       </button>
                      </form>
                      
                      </div>
                    <ul class="navbar-nav centralizar ">
                      
                        @guest
                           
                            @if (Route::has('register'))
                            <div class="row pr-4">  <li class="nav-item dropdown  " >
                                    <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> <p >Sua conta</p>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                      <a class="dropdown-item" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                  
                                    </div>
                                  </li> 
                                </div><div class="row">
                                  <li class="nav-item ">
                                        <a class="nav-link "  href="{{ route('login') }}">Carrinho</a>
                                      </li>
                                
                              	  </div>
                            @endif
                        @else
                        <div class="row"> <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                           
                            </li>
                        </div>
                            <div class="row">
                            <li class="nav-item pl-4 ">
                                    <a class="nav-link "  href="{{ url('/carrinho') }}">Carrinho</a>
                                  </li>
                                </div>
                            
                        @endguest
                    </ul>
               
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple py-2">

            <div class="collapse navbar-collapse "  id="navbarSupportedContent">
              <ul class="navbar-nav container  ">
                      <li class="nav-item hoverbar col-sm px-3 " >
                              <a class="nav-link" href="{{ url('/armazenagem') }}"> <p class="lead text-center"> Armazenagem</p></a>
                            </li>
                
                            <li class="nav-item hoverbar  col-sm px-3  ">
                                  <a class="nav-link" href="{{ url('/freezer') }}"> <p class="lead text-center">Freezer</p></a>
                                </li>
                                <li class="nav-item hoverbar col-sm px-3 ">
                                      <a class="nav-link" href="{{ url('/garrafa') }}"><p class="lead text-center">Garrafa</p></a>
                                    </li>
                                    <li class="nav-item dropdown hoverbar col-sm px-3 " >
                                        <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <p class="lead text-center"> Coleção por Cor</p>
                                        </a>
                                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('/azul') }}">Azul</a>
                                            <a class="dropdown-item" href="{{ url('/rosa') }}">Rosa</a>
                                            <a class="dropdown-item" href="{{ url('/verde') }}">Verde</a>
                                            <a class="dropdown-item" href="{{ url('/preto') }}">Preto</a>
                                      
                                        </div>
                                      </li> 
                                   
                                      <li class="nav-item dropdown hoverbar px-3 col-sm" >
                                          <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <p class="lead text-center">Outros</p>
                                          </a>
                                          <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                              <a class="dropdown-item " href="{{ url('/micro-ondas') }}">Micro-Ondas</a>
                                        
                                          </div>
                                        </li> 
                                        
                                      
              </ul>
             
            </div>
            </nav>
        
    
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('img/tupper.png') }}"width="200px" >
                </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse w-100 order-3 " id="navbarToggler">
                
                <ul class="navbar-nav ml-auto">
                    
                  <li class="nav-item px-3 pt-2 ">
                    
                      <form action="/produtos/pesquisar" method="post" class="form-inline">
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                        <input type="text" class="form-control" placeholder="Digite o que você procura"  id="nome" name="nome" >
                        <button class="btn btn-dark" type="submit" value="Pesquisar">
                          <i class="fa fa-search"></i>
                     </button>
                    </form>
                  </li>
             
                  <li class="nav-item dropdown  px-3 " >
                    <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <p >Sua conta</p>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                      <a class="dropdown-item" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                  
                    </div>
                  </li>  
                  <li class="nav-item pl-4  px-3 pt-3 ">
                    <a class="nav-link text-center"  href="{{ url('/carrinho') }}">Carrinho</a>
                  </li>
                      
                </ul>
    
              </div>
            </nav>
-->
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-md-12 align-items-center justify-content-between navbar-collapse collapse w-100 order-2 dual-collapse2">
               
          
                    <ul class="navbar-nav  mr-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                          <img src="{{ asset('img/MicrosoftTeams-image.png') }}"width="250px" >
                        </a>
                    </ul>
                  
                <ul class="nav justify-content-center mr-auto">
                    <form action="/produtos/pesquisar" method="post" class="form-inline">
                      <div class="input-group col-auto">
                          <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                          <input type="text" class="form-control" placeholder="Digite o que você procura"  id="nome" name="nome" >
                          <div class="input-group-append">
                              <button class="btn btn-dark" type="submit" value="Pesquisar">
                                  <i class="fa fa-search"></i>
                             </button>
                          </div>
                        </div>       
                  </form>
                </ul>
              
  
                    <ul class="navbar-nav ml-auto">
                     
                          
                        @guest
                           
                        @if (Route::has('register'))
                          <li class="nav-item dropdown " >
                                <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i> <p >Sua conta</p>
                                </a>
                                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                  <a class="dropdown-item" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                              
                                </div>
                              </li> 
                          
                              <li class="nav-item pt-3">
                                    <a class="nav-link text-center"  href="{{ route('login') }}">Carrinho</a>
                                  </li>
                            
                             
                        @endif
                    @else
                    <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/home') }}">Home</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                               

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                       
                        </li>
                    
                       
                        <li class="nav-item ">
                                <a class="nav-link text-center"  href="{{ url('/carrinho') }}">Carrinho</a>
                              </li>
                           
                        
                    @endguest
                    </ul>
              
                     
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-purple py-2">

                <div class="navbar-collapse collapse dual-collapse2"  id="navbarSupportedContent">
                  <ul class="navbar-nav container  ">
                          <li class="nav-item hoverbar col-sm px-3 " >
                                  <a class="nav-link" href="{{ url('/armazenagem') }}"> <p class="lead text-center"> Armazenagem</p></a>
                                </li>
                    
                                <li class="nav-item hoverbar  col-sm px-3  ">
                                      <a class="nav-link" href="{{ url('/freezer') }}"> <p class="lead text-center">Freezer</p></a>
                                    </li>
                                    <li class="nav-item hoverbar col-sm px-3 ">
                                          <a class="nav-link" href="{{ url('/garrafa') }}"><p class="lead text-center">Garrafa</p></a>
                                        </li>
                                        <li class="nav-item dropdown hoverbar col-sm px-3 " >
                                            <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <p class="lead text-center"> Coleção por Cor</p>
                                            </a>
                                            <div class="dropdown-menu text-center dropdown-menu-center" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ url('/azul') }}">Azul</a>
                                                <a class="dropdown-item" href="{{ url('/rosa') }}">Rosa</a>
                                                <a class="dropdown-item" href="{{ url('/verde') }}">Verde</a>
                                                <a class="dropdown-item" href="{{ url('/preto') }}">Preto</a>
                                                <a class="dropdown-item" href="{{ url('/branco') }}">Branco</a>
                                                <a class="dropdown-item" href="{{ url('/amarelo') }}">Amarelo</a>
                                                <a class="dropdown-item" href="{{ url('/laranja') }}">Laranja</a>
                                                <a class="dropdown-item" href="{{ url('/roxo') }}">Roxo</a>
                                         
                                            </div>
                                          </li> 
                                       
                                          <li class="nav-item dropdown hoverbar px-3 col-sm" >
                                              <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <p class="lead text-center">Outros</p>
                                              </a>
                                              <div class="dropdown-menu text-center dropdown-menu-center" aria-labelledby="navbarDropdown">
                                                  <a class="dropdown-item " href="{{ url('/micro-ondas') }}">Micro-Ondas</a>
                                                  <a class="dropdown-item " href="{{ url('/geladeira') }}">Geladeira</a>
                                                  <a class="dropdown-item " href="{{ url('/preparacao') }}">Preparação</a>
                                            
                                              </div>
                                            </li> 
                                            
                                          
                  </ul>
                 
                </div>
                </nav>