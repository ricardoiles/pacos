@extends('layouts.layout_panelusuario')
@section('view_estilos')
<link href="{{ asset('css/view_panelusuario.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="columns is-desktop">
  <div class="column is-3 pacos-menu-left">
    <p>¿A dónde iras hoy?</p>
    <div class="columns is-desktop flex-container pacos-columns-categorias" onclick="VerTodosPacos()">
      <div id="Todos" class="pacos-column-todospacos">
        <button class="button pacos-btn-categoria">
          <span class="icon is-small">
            <span class="material-icons">store</span>
          </span>
        </button>
        <label class="pacos-name-categoria">
          Todos 
        </label>
        <label class="pacos-cant-pacos-categoria">
          ({{$cantpacos = count(collect($sitios))}})
        </label>
      </div>
    </div>
    @foreach($categorias as $cat)
      <div id="{{ $cat->id }}" class="columns is-desktop flex-container pacos-columns-categorias" onclick="VerPacosxCat('{{ $cat->id }} ')">
        <div class="pacos-column-categoria">
          <label class="pacos-name-categoria">
            {{ $cat->nombrecat }} 
          </label>
        </div>
      </div>
    @endforeach
  </div>
  <div class="column is-9 pacos-div-right" style="width: 93%;">
    <p>
        <img src="{{ asset('images/logoPACOS.png') }}" class="mini-logopacos">
        Sitios cercanos en <b>
        @if(!empty($ciudad))
          @foreach($ciudad as $ciudad)
            <a class="is-active-pacos" onclick="modalOpen()"> {{ $ciudad->Nombre }} </a></b>
          @endforeach
        @else
            <a class="is-active-pacos" onclick="modalOpen()">Elegir ciudad </a></b>
        @endif
    </p>
    <div id="Pacos" class="columns is-desktop flex-container" style="margin-left: 10px;">
      @if(empty($sitios))
            
        @else
        @foreach($sitios as $pacos)
        <div class="column box is-3 pacos-sitio ">
          <article class="media">
            <div class="media-left">
              <figure class="image">
                <img src="{{ asset('storage'.'/'.$pacos->fotoperfil) }}" alt="{{ $pacos->namerest }}" 
                  style="border-radius: 50%; width: 50px; height: 50px;">
              </figure>
            </div>
            <div class="media-content">
              <div class="content" style="line-height: 100%; height: 80px; max-height: 80px">
                <p>
                  <strong> {{ $pacos->namerest }}</strong> &middot; <small>{{ $pacos->catrest }}</small>
                  <br>
                    <small>{{ $pacos->ciudad }} &middot; {{ $pacos->direccion }} &middot; {{ $pacos->barriovere }}</small>
                  <br>
                    <small>  {{ substr("$pacos->descripcion", 0, 40).'...' }}</small>
                </p>
              </div>
              <nav class="level is-mobile" style="margin-bottom: 5px">
                <div class="level-left">
                  <a href="{{ url('/pacos/'.$pacos->namerest.'/reseñas') }}" class="level-item tooltip" data-tooltip="Reseñas" aria-label="reply">
                    <span class="icon is-small">
                      <i class="material-icons">how_to_vote</i>
                    </span>
                  </a>
                  <a href="{{ action('PerfilpacosController@show', ['namepacos' => $pacos->namerest]) }}" class="level-item tooltip" data-tooltip="Ir al sitio" aria-label="retweet">
                    <span class="icon is-small">
                      <i class="material-icons">open_in_new</i>
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
        <div class="column is-12" style="margin: 5px;">
            <form method="post" action="{{ url('busqueda/pacos/ciudad')}}">
                {{ csrf_field() }}                
                <div class="field is-horizontal">
                  <div class="field-body">
                    <div class="field">
                      <p class="control is-expanded  has-icons-left" >
                        <input name="ciudad" list="ciudades" class="input" type="text" placeholder="Escribe aqui la ciudad  para ver PACOS" required="">
                        <datalist id="ciudades">
                            @foreach($ciudades as $ciudad)
                              <option value="{{ $ciudad->Nombre }}">
                            @endforeach
                        </datalist>
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

