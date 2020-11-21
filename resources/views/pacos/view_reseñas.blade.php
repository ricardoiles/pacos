@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
@endsection

@section('is-active-2')
is-active-pacos
@endsection

@section('is-btn-selected-reseñas')
pacos-btnoptions--infobasica-pacos
@endsection

@section('is-btn-selected')
pacos-btnmenu-pacos
@endsection

@section('is-btn-selected-comida')
pacos-btnmenu-pacos
@endsection

@section('content')
<div class="tile" style="margin-top: -4%;">
  <div class="tile is-parent is-vertical is-3">
    
  </div>
  <div class="tile pacos-tile-reseñas">
        <article class="" style="width: 100%;">
            <!-- <div class="tabs is-left main-menu" id="nav">
                <ul style="border-bottom-style: none;">
                    <li data-target="pane-1" class="is-active pacos-li-reseñas" id="1">
                        <a>
                            <span class="icon is-small"><span class="material-icons">how_to_vote</span></span>
                            <span>Reseñas</span>
                        </a>
                    </li>
                </ul>
            </div> -->
            <div class="tab-content" style="background-color: inherit; padding-left: 13px; padding-right: 13px">
                <div class="tab-pane is-active" id="pane-1">
                   <div class="columns is-desktop flex-container" style="overflow-y: scroll; height: 200px">
                    @foreach($reseñas as $reseña)
                        <div class="column is-12 box pacos-box-reseña">
                            <div class="columns is-desktop">
                                <div class="column is-2 pacos-column-imageuser">
                                    <img src="https://source.unsplash.com/user/erondu/1600x900" title="user" style="width: 70px;height: 70px;border-radius: 50%">
                                </div>
                                <div class="column is-10 pacos-column-inforeseña">
                                    <p><b> {{ $reseña->nameuser }} {{ $reseña->lastnameuser }} &rsaquo; {{ $reseña->namepacos }}</b></p>
                                    <p><small>{{ $reseña->hora }} &middot; {{ $reseña->fecha }}</small></p>
                                    <p>{{ $reseña->reseña }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   </div>
                    <form method="post" action="{{ url('pacos/store/resenas') }}">
                    {{ csrf_field() }}
                        <div class="columns is-desktop pacos-footer-nuevareseña">
                            @foreach($pacosinfo as $pacos)
                            <div class="column is-12">
                                <div class="field is-horizontal">
                                  <div class="field-body">
                                    <div class="field" style="flex-grow: 0; width: 50px">
                                        <img src="{{ asset('images/user.png') }}" style="width: 40px;height: 40px;border-radius: 50%" title="Postear como: {{ auth()->user()->name }}">
                                    </div>
                                    <div class="field pacos-input-nuevareseña" style="flex-grow: 0; width: 100%">
                                        <input type="hidden" name="idpacos" value="{{ $pacos->idrest }}">
                                        <input type="hidden" name="namepacos" value="{{ $pacos->nombre }}">
                                        <input type="hidden" name="iduser" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
                                        <input type="hidden" name="hora" value="{{ date('h:i:s', strtotime('- 1 minute')) }}">
                                        <input class="input" type="text" name="reseña" placeholder="Escribe aqui tu reseña sobre este sitio" required="" style="border-radius: 20px" maxlength="198">
                                    </div>
                                    <div class="field pacos-button-nuevareseña" style="flex-grow: 0;">
                                        <input class="button pacos-btn-postear" type="submit" value="&#10148;" title="Postear">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        
        </article>
  </div>
</div>
@endsection
