<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PACOS &middot; Sitios para comer</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/tabs.css') }}" rel="stylesheet">
        <link href="{{ asset('css/iconfont/material-icons.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @yield('view_estilos')
    </head>
    <body>
        <div id="app">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">   
                    <a href="{{ url('/home') }}" class="navbar-item">
                        <img src="{{ asset('images/logoPACOS.png') }}"> &nbsp;
                        <b>PACOS </b> <small class="pacos">&nbsp; &middot; Sitios para comer</small>
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                    </a>
                </div>
                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                        <!-- <a href="{{ url('/home') }}" class="navbar-item">Sitios cercanos</a> -->
                        <a href="{{ url('/home') }}" class="navbar-item">Sitios destacados</a>
                        <a href="{{ url('/home') }}" class="navbar-item">Comidas</a>
                        <a class="" style="width: 100px;"></a>
                        <div class="field navbar-item">
                          <p class="control has-icons-right">
                            <input class="input is-rounded pacos-input-search" type="text" placeholder="Busca sitios o comidas">
                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                              <i class="material-icons">search</i>
                            </span>
                          </p>
                        </div>
                    </div>
                    <div class="navbar-end">
                      <div class="navbar-item">
                        <div class="buttons">
                          @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Inicar sesión</a>
                                <a class="navbar-item " href="{{ url('/registrarme') }}">Registrarmee</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link">
                                        <img class="is-rounded pacos-foto-perfil-nav" src="{{ asset('images/user.png') }}" title="{{ Auth::user()->name }}">
                                    </a>
                                    <div class="navbar-dropdown is-right">
                                        <p style="text-align: center;"><b>{{ Auth::user()->name.' '.Auth::user()->apellidos  }}</b></p>
                                        <a class="navbar-item" href="">
                                          Editar mi perfil
                                        </a>
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                      </div>
                    </div>
                </div>
            </nav>
            @yield('content')  
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bulmajs/bulma.js') }}"></script>
        
        <script src="{{ asset('js/tabs.js') }}"></script>
        <script src="{{ asset('js/scripts/lib_formularios.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/scripts/comidas.js') }}"></script>
        <script>
            var asset_global='{{asset("/storage")}}';
            var url_reseñas_global = '{{ url("/pacos") }}';
        </script>
    </body>
</html>
