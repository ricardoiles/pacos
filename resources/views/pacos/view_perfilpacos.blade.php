@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>
@endsection

@section('is-active')
is-active-pacos
@endsection

@section('is-btn-selected-comida')
pacos-btnmenu-pacos
@endsection

@section('is-btn-selected')
pacos-btnoptions--infobasica-pacos
@endsection

@section('is-btn-selected-reseñas')
pacos-btnmenu-pacos
@endsection

@section('content')
    <div class="tile">
      <div class="tile is-parent is-vertical is-3">
        
      </div>
      <div class="tile is-parent pacos-allinfo-pacos">
        <div class="tile pacos-div-allinfo-pacos">
            <article class="box pacos-article-allinfo" style="width: 100%">
              @foreach($pacosinfo as $pacos)
                <b>Ubicacion y horario</b>
                <p>{{ $pacos->pais }} &middot; {{ $pacos->depto }} </p>
                <p>{{ $pacos->ciudad }} &middot; {{ $pacos->BarrioVere }} </p>
                <p>{{ $pacos->Direccion }}</p>
                <p><b>Abierto:</b> {{ $pacos->diaopen }} A {{ $pacos->diaclose }}</p>
                <p>{{ $pacos->horaopen }} A {{ $pacos->horaclose }}</p>
                @endforeach
            </article>

        </div>
        <div class="tile pacos-div-allinfo-pacos">
            <article class="box pacos-article-allinfo" style="width: 100%; text-align: justify;">
                <b>Descripcion del sitio</b>
                <p>
                @foreach($pacosinfo as $pacos)
                  {{ $pacos->Descripcion }}
                @endforeach</p>
            </article>
        </div>
        <div class="tile pacos-div-allinfo-pacos-last">
            <article class="box pacos-article-allinfo" style="width: 100%; padding-bottom: 30px;">
                <b>Contacto</b>
                @foreach($redes as $red)  
                  <div class="columns" style="margin-top: 10px">
                    <div class="column is-12" style="padding: 0px;margin-top: -10px">
                        <img src="{{ $red->Icono }}" style="width: 15px; height: 15px; border-radius: 20%"> 
                        {{ $red->Url }}
                    </div>
                  </div>
                @endforeach
            </article>
        </div>
      </div>
    </div>
@endsection
@section('content2')
<div class="tile">
  <div class="tile is-parent is-vertical is-3 ">
    
  </div>
  <div class="tile pacos-multimediadiv-pacos">
        <article class="box" style="width: 100%;">
            <b>Multimedia</b>
            <br>
            <div class="tabs is-left main-menu" id="nav">
                <ul>
                    <li data-target="pane-1" class="is-active" id="1">
                        <a>
                            <span class="icon is-small"><span class="material-icons">photo</span></span>
                            <span>fotos</span>
                        </a>
                    </li>
                    <li data-target="pane-2" id="2">
                        <a>
                            <span class="icon is-small"><span class="material-icons">play_circle_filled</span></span>
                            <span>Videos</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane is-active" id="pane-1">
                   Fotos
                </div>
                <div class="tab-pane" id="pane-2">
                    Videos
                </div>
            </div>
        
        </article>
  </div>
</div>
@endsection
