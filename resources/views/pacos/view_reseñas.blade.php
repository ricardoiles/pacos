@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
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

@section('content')
<div class="tile">
  <div class="tile is-parent is-vertical is-3">
    
  </div>
  <div class="tile pacos-multimediadiv-pacos">
        <article class="" style="width: 100%;">
            <div class="tabs is-left main-menu" id="nav">
                <ul style="border-bottom-style: none;">
                    <li data-target="pane-1" class="is-active" id="1">
                        <a>
                            <span class="icon is-small"><span class="material-icons">how_to_vote</span></span>
                            <span>Reseñas</span>
                        </a>
                    </li>
                    <li data-target="pane-2" id="2">
                        <a>
                            <span class="icon is-small"><span class="material-icons">post_add</span></span>
                            <span>Hacer una reseña</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" style="background-color: inherit; padding-left: 13px; padding-right: 13px">
                <div class="tab-pane is-active" id="pane-1">
                   <div class="columns is-desktop">
                        <div class="column is-12 box">
                            <div class="column is-desktop">
                                <div class="column is-4">
                                    <img src="" title="user">
                                </div>
                                <div class="column is-8">
                                    
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="tab-pane" id="pane-2">
                    Videos
                </div>
            </div>
        
        </article>
  </div>
</div>
@endsection
