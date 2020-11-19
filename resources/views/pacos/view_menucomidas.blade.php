@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
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
          <ul class="menu-list">
            <li>
              <button class="button @yield('is-btn-selected')">
                  <span class="icon is-small">
                    <span class="material-icons">category</span>
                  </span>
              </button>
              <label class="pacos-title-menu">
                Categorias
              </label>
            </li>
            @foreach($catcomidas as $categoria)
            <li>
              <a onclick="showComida({{ $categoria->idcat }})">
                <img src="{{ asset('storage'.'/'.'/'.$categoria->fotocat) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                <label class="pacos-title-menu">
                  {{ $categoria->nombrecat }}
                </label>
              </a>
            </li>
            @endforeach
          </ul>
        </aside>
      </div>
      <div class="tile is-parent is-9 pacos-allinfo-pacos flex-container">
        <div id="Comidas" class="columns is-desktop flex-container">
          @foreach($comidas as $comida)
            <div class='column is-4 box' style='line-height: 100%; text-align: justify; margin-right: 10px; margin-bottom: 10px; height: 130px;    width: 32.16%;'>
              <div class='columns is-desktop'>
                <div class='column is-3' style="width: 30%">
                    <image class='pacos-ordenar-fotocomida' src="{{ asset('storage'.'/'.'/'.'/'.$comida->fotocomida) }}">
                </div>
                <div class='column is-9' style='font-size: 13px; width: 70%; margin-left: -10px;'>
                    <b> {{ $comida->nombrecomida }} </b>
                    <p>{{ $comida->ingredientes }}</p>                                                                       
                    <p><b class='pacos-is-active'>${{ $comida->preciocomida }}</b></p>
                    <div class="column is-12" style="text-align: left;">
                      <a href="">
                        <label class='reseñas'><i class='material-icons'>sms</i></label>
                      </a>
                      <a href="">
                        <label class='reseñas'><i class='material-icons'>room_service</i></label>
                      </a>
                      <a href="">
                        <label class='reseñas'><i class='material-icons'>star_border</i></label>
                      </a>
                    </div>
                </div>
                <label class='more_vert-comida'><i class='material-icons'>more_vert</i></label>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection

