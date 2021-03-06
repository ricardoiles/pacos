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
                        <b>PACOS</b> <label class="pacos">&nbsp; &middot; Sitios para comer</label>
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                    </a>
                </div>
                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a href="{{ url('/home') }}" class="navbar-item">Sitios cercanos</a>
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
            <div class="tile is-ancestor">
              <div class="tile is-vertical is-10">
                @foreach($fotos as $foto)
                <div class="tile is-parent div-pacos-tile-cover" style="background-image: url('{{ asset('storage'.'/'.$foto->Portada) }}');">
                    <article class="">
                      
                    </article>
                </div>
                @endforeach
                <div class="tile pacos-tile-allmenu">
                  <div class="tile is-parent is-vertical is-3 pacos-menu-optionspacos">
                    <article class=" is-child box pacos-secciones-pacos">
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
                            <li><a href="{{ url('/pacos/'.$pacos->nombre.'/menu') }}" class="@yield('is-active-1')">@endforeach
                              <button class="button @yield('is-btn-selected-comida')">
                                  <span class="icon is-small">
                                    <span class="material-icons">food_bank</span>
                                  </span>
                              </button>
                              <label class="pacos-title-menu">
                                Comida
                              </label>
                            </a></li>
                            <li><a href="{{ url('/pacos/'.$pacos->nombre.'/reseñas') }}" class="@yield('is-active-2')">
                                <button class="button @yield('is-btn-selected-reseñas')">
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

                    <article class="pacos-infobasica-pacos">
                      @foreach($pacosinfo as $pacos)
                      <b>{{ $pacos->nombre }}</b><br>
                      
                      <label>{{ $pacos->category }}</label> <br>
                      @endforeach
                      <div class="block pacos-btns-infobasica-pacos">
                          @foreach($pacosinfo as $pacos)
                            @if($pacos->domicilios == 1)
                              <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Hacemos domicilios de comida">
                                  <span class="icon is-small">
                                    <span class="material-icons pacos-fontsize-btnoptions-pacos">directions_bike</span>
                                  </span>
                              </button>
                            @endif
                            @if($pacos->ordenes == 1)
                              <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Puedes ordenar comida">
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
                            
                            <button class="button pacos-btnoptions--infobasica-pacos tooltip" data-tooltip="Enviar mensaje al sitio">
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
                <div class="tile is-parent tips">
                  <article class="" style="margin-top: 20px">
                    <span class="material-icons">batch_prediction</span>
                    Tips  &nbsp;&nbsp;
                    <div class="notification box pacos-div-notificacion" id="6">
                      <!-- <button class="delete" onclick="myFunction(6);"></button> -->
                      <p><b>Tip 1</b></p>
                      Esta es una corta notificacion, al recibir un mensaje o pendientes
                    </div>
                    <div class="notification box pacos-div-notificacion" id="3">
                      <!-- <button class="delete" onclick="myFunction(3);"></button> -->
                      <p><b>Tip 2</b></p>
                      Esta es una corta notificacion, al recibir un mensaje o pendientes
                    </div>
                    <div class="notification box pacos-div-notificacion" id="hey">
                      <!-- <button class="delete" onclick="myFunction('hey');"></button> -->
                      <p><b>Tip 3</b></p>
                      Esta es una corta notificacion, al recibir un mensaje o pendientes
                    </div>
                  </article>
                </div>
            </div>    
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bulmajs/bulma.js') }}"></script>
        
        <script src="{{ asset('js/tabs.js') }}"></script>
        <script src="{{ asset('js/scripts/perfilpacos.js') }}"></script>
        <script src="{{ asset('js/scripts/comidas.js') }}"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
          function myFunction($id) {
            var element = document.getElementById($id);
            element.style.display="none";
          }
        </script>
        <script>
            var asset_global='{{asset("/storage")}}';
            var url_reseñas_global = '{{ url("/pacos") }}';
        </script>
    </body>
</html>
