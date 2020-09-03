<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<body>
    <div id="app">
        <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-custom-1">
           
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('img/logo.png') }}"width="110px" height="45px"alt="Logo da Mirror Fashion">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
     
                    <div class="input-group margem ">
                        <input type="text"  class=" form-control" placeholder="Digite o que você procura">
                        <div class="input-group-append">
                          <button class="btn btn-dark" type="button">
                               <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav centralizar ">
                        <!-- Authentication Links -->
                        @guest
                           
                            @if (Route::has('register'))
                            <li class="nav-item dropdown px-1  " >
                                    <a class="nav-link dropdown-toggle  text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> <p >Sua conta</p>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                      <a class="dropdown-item" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                  
                                    </div>
                                  </li>
                                  <li class="nav-item ">
                                        <a class="nav-link "  href="#">Lista de Desejos</a>
                                      </li>
                                
                              	
                            @endif
                        @else
                            <li class="nav-item dropdown">
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
                            <li class="nav-item ">
                                    <a class="nav-link "  href="#">Lista de Desejos</a>
                                  </li>
                            
                        @endguest
                    </ul>
               
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple py-4">


            <div class="collapse navbar-collapse margem "  id="navbarSupportedContent">
              <ul class="navbar-nav container  ">
                      <li class="nav-item hoverbar px-3 " >
                              <a class="nav-link" href="{{ url('/armazenagem') }}">Link</a>
                            </li>
                
                            <li class="nav-item hoverbar px-3  ">
                                  <a class="nav-link" href="{{ url('/armazenagem') }}">Link</a>
                                </li>
                                <li class="nav-item hoverbar px-3 ">
                                      <a class="nav-link" href="{{ url('/armazenagem') }}">Link</a>
                                    </li>
              </ul>
             
            </div>
            </nav>
        <main >
            @yield('content')
        </main>
    </div>
</body>
 

