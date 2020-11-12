@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>
@endsection

@section('is-active-1')
is-active-pacos
@endsection

@section('is-btn-selected')
pacos-btnmenu-pacos
@endsection

@section('is-btn-selected-comida')
pacos-btnoptions--infobasica-pacos
@endsection

@section('content')
    <div class="tile">
      <div class="tile is-parent is-vertical is-3 box pacos-perfilpacos-categorias-comida">
        <aside class="menu">
          <button class="button @yield('is-btn-selected')">
              <span class="icon is-small">
                <span class="material-icons">store</span>
              </span>
          </button>
          <label class="pacos-title-menu">
            Perfil sitio
          </label>
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
      </div>
      <div class="tile is-parent is-9 pacos-allinfo-pacos">
        <div class="tile pacos-div-allinfo-pacos">
            <article class="box" style="width: 100%">
              un box
            </article>

        </div>
        <div class="tile pacos-div-allinfo-pacos">
            <article class="box" style="width: 100%; text-align: justify;">
                <b>Descripcion del sitio</b>
                <p>
               
            </article>
        </div>
        <div class="tile pacos-div-allinfo-pacos-last">
            <article class="box" style="width: 100%">
                <b>Contacto</b>
                
            </article>
        </div>
      </div>
    </div>
@endsection

