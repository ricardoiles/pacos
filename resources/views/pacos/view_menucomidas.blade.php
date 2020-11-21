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

@section('is-btn-selected-reseñas')
pacos-btnmenu-pacos
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
                  <label>
                    Categorias
                  </label>
            </li>
            @foreach($catcomidas as $categoria)
            <li>
              <a onclick="showComida({{ $categoria->idcat }})">
                <img src="{{ asset('storage'.'/'.'/'.$categoria->fotocat) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                <label>
                  {{ $categoria->nombrecat }}
                </label>
              </a>
            </li>
            @endforeach
          </ul>
        </aside>
      </div>
      <div class="tile is-parent is-9 pacos-allinfo-pacos flex-container">
        <div id="Comidas" class="columns is-desktop flex-container" style="overflow-y: auto; height: 40vh">
          @foreach($comidas as $comida)
            <div class='column is-4 box pacos-comida pacos-box-comida'>
              <div class='columns is-desktop'>
                <div class='column is-3' style="width: 30%">
                    <image class='pacos-ordenar-fotocomida' src="{{ asset('storage'.'/'.'/'.'/'.$comida->fotocomida) }}">
                </div>
                <div class='column is-9 pacos-column-infocomida'>
                    <b> {{ $comida->nombrecomida }} </b>
                    <p>{{ $comida->ingredientes }}</p>                            
                    <p><b class='pacos-is-active'>${{ $comida->preciocomida }}</b></p>
                    <div class="column is-12" style="text-align: left;">
                      <a href="" style="color: #414d58;">
                        <label class='reseñas'><i class='material-icons'>sms</i></label>
                      </a>
                      <a href="" style="color: #414d58;">
                        <label class='ordenar'><i class='material-icons'>room_service</i></label>
                      </a>
                    </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection

