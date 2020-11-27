<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
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
                        <b>PACOS</b>
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                    </a>
                </div>
                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                       <a class="navbar-item " href="#SitiosCercanos">Sitios cercanos</a>
                       <a class="navbar-item " href="#SitiosDestacados">Sitios destacados</a>
                       <a class="navbar-item " href="#Comidas">Comidas</a>
                    </div>
                    <div class="navbar-end">
                      <div class="navbar-item">
                        <div class="buttons">
                          @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                            <a class="navbar-item">
                                Option
                            </a>
                            <a class="navbar-item">
                                Other option
                            </a> 
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    <img class="is-rounded pacos-foto-perfil-nav" src="https://media.geeksforgeeks.org/wp-content/uploads/20200617121759/bill-gates.jpg" title="{{ Auth::user()->name }}">
                                </a>
                                <div class="navbar-dropdown is-right">
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
        </div>
        @yield('content')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bulmajs/bulma.js') }}"></script>
        
        <script src="{{ asset('js/tabs.js') }}"></script>

        <!-- <script>
          function myFunction($id) {
            var element = document.getElementById($id);
            element.style.display="none";
          }
        </script> -->
        <script src="{{ asset('js/scripts/lib_formularios.js') }}"></script>
    </body>
</html>
