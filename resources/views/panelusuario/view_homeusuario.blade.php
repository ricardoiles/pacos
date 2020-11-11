@extends('layouts.layout_panelusuario')
@section('view_estilos')
<link href="{{ asset('css/view_panelusuario.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="columns is-desktop">
  <div class="column is-3 pacos-menu-left">
    <p>¿A dónde iras hoy?</p>
    <p></p>
  </div>
  <div class="column is-9 pacos-div-right">
    <p>
        <img src="{{ asset('images/logoPACOS.png') }}" class="mini-logopacos">
        Sitios en <b>
        @if(!empty($ciudad))
            <a class="is-active-pacos" onclick="modalOpen()"> {{ $ciudad }} </a></b>
        @else
            <a class="is-active-pacos" onclick="modalOpen()">Elegir ciudad </a></b>
        @endif
    </p>
    <div class="columns is-desktop flex-container" style="margin-left: 10px;">
      @if(empty($sitios))
            
        @else
        @foreach($sitios as $pacos)
        <div class="column box is-5 pacos-sitio ">
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64">
                <img src="{{ asset('storage'.'/'.$pacos->fotoperfil) }}" alt="{{ $pacos->namerest }}">
              </figure>
            </div>
            <div class="media-content">
              <div class="content" style="line-height: 100%; height: 90px">
                <p>
                  <strong> {{ $pacos->namerest }}</strong> &middot; <small>{{ $pacos->catrest }}</small>
                  <br>
                    <small>{{ $pacos->ciudad }} &middot; {{ $pacos->direccion }} &middot; {{ $pacos->barriovere }}</small>
                  <br>
                    {{ $pacos->descripcion }}
                </p>
              </div>
              <nav class="level is-mobile" style="margin-bottom: 5px">
                <div class="level-left">
                  <a class="level-item" aria-label="reply">
                    <span class="icon is-small">
                      <i class="material-icons">chat_bubble_outline</i>
                    </span>
                  </a>
                  <a class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                      <i class="material-icons">star_border</i>
                    </span>
                  </a>
                  <a href="{{ action('PerfilpacosController@show', ['namepacos' => $pacos->namerest]) }}" class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                      <i class="material-icons">open_in_new</i>
                    </span>
                  </a>
                </div>
                <div class="level-right">
                  <a class="level-item" aria-label="reply">
                    <span class="icon is-small">
                      <i class="material-icons">more_vert</i>
                    </span>
                  </a>
                </div>
              </nav>
            </div>
          </article>
        </div>  
        @endforeach
        @endif
    </div>
    
  </div>
</div>
<div class="modal" id="modalAddCategory">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
        <p class="modal-card-title">
            <img src="{{ asset('images/logoPACOS.png') }}" class="mini-logopacos">
            Buscar PACOS por ciudad
        </p>
      <button class="delete" aria-label="close" onclick="modalClose()"></button>
    </header>
    <section class="modal-card-body">
      <div class="columns is-mobile">
        <div class="column is-12 box" style="margin: 5px;">
            <form method="post" action="{{ url('busqueda/pacos/ciudad')}}">
                {{ csrf_field() }}                
                <div class="field is-horizontal">
                  <div class="field-body">
                    <div class="field">
                      <p class="control is-expanded  has-icons-left" >
                        <input name="ciudad" class="input" type="text" placeholder="Escribe aqui la ciudad  para ver PACOS" required="">
                        <span class="icon is-small is-left">
                          <i class="material-icons">edit_location</i>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
        </div>
    </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" class="button is-rounded" value="Buscar" style="background-color: rgb(210,23,52); color: white; width: 100%;">
    </footer>
    </form>
  </div>
</div>
@endsection

