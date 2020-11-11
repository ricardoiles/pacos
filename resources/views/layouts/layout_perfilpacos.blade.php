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
                        <a href="{{ url('/') }}" class="navbar-item">Sitios cercanos</a>
                        <a href="{{ url('/') }}" class="navbar-item">Sitios destacados</a>
                        <a href="{{ url('/') }}" class="navbar-item">Comidas</a>
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
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
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
            <div class="tile is-ancestor">
              <div class="tile is-vertical is-10">
                @foreach($fotos as $foto)
                <div class="tile is-parent div-pacos-tile-cover" style="background-image: url('{{ asset('storage'.'/'.$foto->Portada) }}');">
                    <article class="">
                      
                    </article>
                </div>
                @endforeach
                <div class="tile">
                  <div class="tile is-parent is-vertical is-3">
                    <article class=" is-child box">
                        <aside class="menu">
                          <ul class="menu-list">
                            <li>@foreach($pacosinfo as $pacos)
                              <a href="{{ action('PerfilpacosController@show', ['namepacos' => $pacos->nombre]) }}" class="card-footer-item @yield('is-active')">
                                <button class="button @yield('is-btn-selected')">
                                    <span class="icon is-small">
                                      <span class="material-icons">store</span>
                                    </span>
                                </button>
                                <label class="pacos-title-menu">
                                  Perfil sitio
                                </label>
                            </a></li>@endforeach
                            @foreach($pacosinfo as $pacos)
                            <li><a href="{{ url('/manage/pacos/menu/'.$pacos->nombre) }}" class="@yield('is-active-1')">@endforeach
                              <button class="button @yield('is-btn-selected-comida')">
                                  <span class="icon is-small">
                                    <span class="material-icons">food_bank</span>
                                  </span>
                              </button>
                              <label class="pacos-title-menu">
                                Comida
                              </label>
                            </a></li>
                            <li><a>
                                <button class="button pacos-btnmenu-pacos">
                                  <span class="icon is-small">
                                    <span class="material-icons">how_to_vote</span>
                                  </span>
                              </button>
                              <label class="pacos-title-menu">
                                Reseñas
                              </label>
                            </a></li>
                          </ul>
                        </aside>
                    </article>
                  </div>
                  <div class="tile is-parent is-child box pacos-div-infobasica-pacos">
                    @foreach($fotos as $foto)
                      <img class="is-rounded pacos-foto-perfil-pacos" src="{{ asset('storage'.'/'.$foto->Perfil) }}">
                    @endforeach
                      
                    
                    <div class="dropdown is-right is-hoverable pacos-moreoption-pacos">
                      <div class="dropdown-trigger">
                        <label class="pacos-cursor-pointer" aria-haspopup="true" aria-controls="dropdown-menu4">
                          <span class="material-icons">more_vert</span>
                          <span class="icon is-small">
                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                          </span>
                        </label>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                        <div class="dropdown-content">
                          <a href="#" class="dropdown-item">
                            Almacenar
                          </a>
                          <a href="#" class="dropdown-item">
                            Reportar
                          </a>
                        </div>
                      </div>
                    </div>

                    <article class="pacos-infobasica-pacos">
                      @foreach($pacosinfo as $pacos)
                      <b>{{ $pacos->nombre }}</b><br>
                      
                      <label>{{ $pacos->category }}</label> <br>
                      @endforeach
                      <div class="block pacos-btns-infobasica-pacos">
                          @foreach($pacosinfo as $pacos)
                            @if($pacos->domicilios == 1)
                              <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Domicilios de comida">
                                  <span class="icon is-small">
                                    <span class="material-icons pacos-fontsize-btnoptions-pacos">directions_bike</span>
                                  </span>
                              </button>
                            @endif
                            @if($pacos->ordenes == 1)
                              <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Ordenar comida">
                                  <span class="icon is-small">
                                    <span class="material-icons pacos-fontsize-btnoptions-pacos">room_service</span>
                                  </span>
                              </button>
                            @endif
                            @if($pacos->reservas == 1)
                            <a href="{{ url('/pacos/'.$pacos->nombre.'/reservar') }}">
                              <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Reservar mesa">
                                  <span class="icon is-small">
                                    <span class="material-icons pacos-fontsize-btnoptions-pacos">receipt</span>
                                  </span>
                              </button>
                            </a>
                            @endif
                          @endforeach
                            <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Compartir sitio">
                                <span class="icon is-small">
                                  <span class="material-icons pacos-fontsize-btnoptions-pacos">share</span>
                                </span>
                            </button>
                            <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Destacar">
                                <span class="icon is-small">
                                  <span class="material-icons pacos-fontsize-btnoptions-pacos">star_rate</span>
                                </span>
                            </button>
                            <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Enviar mensaje">
                                <span class="icon is-small">
                                  <span class="material-icons pacos-fontsize-btnoptions-pacos">chat_bubble</span>
                                </span>
                            </button>
                        </div>              
                    </article>
                  </div>
                </div>
                @yield('content')

                @yield('content2')
                </div>
                <div class="tile is-parent">
                  <article class="" style="margin-top: 20px">
                    <span class="material-icons">notifications</span>
                    Notificaciones  &nbsp;&nbsp; (1)
                    <div class="notification box pacos-div-notificacion" id="6">
                      <button class="delete" onclick="myFunction(6);"></button>
                      <p><b>1 Notificacion</b></p>
                      Esta es una corta notificacion, al recibir un mensaje o pendientes
                    </div>
                    <div class="notification box pacos-div-notificacion" id="3">
                      <button class="delete" onclick="myFunction(3);"></button>
                      <p><b>2 Notificacion</b></p>
                      Esta es una corta notificacion, al recibir un mensaje o pendientes
                    </div>
                    <div class="notification box pacos-div-notificacion" id="hey">
                      <button class="delete" onclick="myFunction('hey');"></button>
                      <p><b>3 Notificacion</b></p>
                      Esta es una corta notificacion, al recibir un mensaje o pendientes
                    </div>
                  </article>
                </div>
            </div>    
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bulmajs/bulma.js') }}"></script>
        <script>feather.replace()</script>
        <script src="{{ asset('js/tabs.js') }}"></script>

        <script>
          function myFunction($id) {
            var element = document.getElementById($id);
            element.style.display="none";
          }
        </script>
    </body>
</html>
