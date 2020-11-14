@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
@endsection

@section('is-active-1')

@endsection

@section('is-btn-selected')
pacos-btnmenu-pacos
@endsection

@section('is-btn-selected-comida')
pacos-btnmenu-pacos
@endsection

@section('content')
<div class="tile">
  <div class="tile is-parent is-vertical is-3">
    
  </div>
  <div class="tile pacos-multimediadiv-pacos" style="margin-top: -40px;">
    <article class="box" style="width: 100%">
        <div class="columns is-desktop">
          @foreach($reservaciones as $reserva)
            @if($reserva->iduser == Auth::user()->id)
             <div class="column is-3 pacos-seccion-detalles-reserva">
                  <div class="columns is-desktop">
                      @foreach($fotos as $foto)
                      <div class="column is-3">
                          <div class="pacos-reservas-fotopacos" style="background-image: url('{{ asset('storage'.'/'.$foto->Perfil) }}');margin-top: 20%"></div>
                      </div>
                      @endforeach
                      <div class="column is-9" style="padding-left: 20px">
                          <b id="Paccos">{{ $reserva->nombrerest }}</b>
                          <p>Reservacion N° <b>{{ $reserva->idreserva }}</b></p>
                          <p>{{ $reserva->fechareserva }} &middot; {{ $reserva->horareserva }} </p>
                          @if($reserva->consincomida == 0)
                          <p><b class="pacos-is-active">Sin comida</b></p>
                          @endif
                      </div>
                  </div>
             </div>
              <div class="column is-9">  
                <div class="columns is-desktop">
                  <div class="column is-12" style="text-align: center;">
                    <div class="dropdown is-right is-hoverable">
                      <div class="dropdown-trigger">
                        <button class="button is-rounded pacos-btn-selectedfood" aria-haspopup="true" aria-controls="dropdown-menu4" title="Agregar comida a la reservación">
                          <span><i class="material-icons">fastfood</i></span>
                          <span class="icon is-small">
                            <i class="material-icons">add</i>
                          </span>
                        </button>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                        <div class="dropdown-content pacos-dropdown-comida">
                          @foreach($comidas as $comida)
                            <div class="columns is-desktop">
                              <div class="column is-2">
                                <div class="pacos-reservas-fotopacos" style="background-image: url('{{ asset('storage'.'/'.'/'.$comida->fotocomida) }}');margin-top: 20%"></div>
                              </div>
                              <div class="column is-10">
                                  <div class="dropdown-item" style="line-height: 105%;">                        
                                    <p><strong>{{ $comida->nombrecomida }}</strong></p>
                                    <p>{{ $comida->ingredientes }} </p>
                                    <p><b>Cantidad: </b> &middot; <b>${{ $comida->preciocomida }}</b></p>
                                    <p>
                                      <button class="button is-rounded" onclick="agregarComida({{ $comida->idcomida }})"><i class="material-icons">add</i></button>
                                    </p>
                                  </div>
                              </div>
                            </div>
                          <hr class="dropdown-divider">
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
                
                <div class="columns is-desktop">
                  <div class="column is-12" >
                    <form method="post" action="{{ url('pacos/reservar/registrarOrden') }}">  
                        {{ csrf_field() }}
                        <input type="hidden" id="idres" name="idres" value="{{ $reserva->idreserva }}">
                    <div id="Comidas" class="columns is-desktop flex-container">
                       
                     </div>
                     <input class="button is-rounded pacos-btn-enviar"  type="submit" value="Pagar reservación"> <!-- onclick="enviarOrden()" -->
                     </form>
                  </div>
                </div>          
        @endif
      @endforeach 
    </article>
  </div>
</div>



<!-- <div id="modal" class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box">
      <article class="media">
        <div class="media-left">
          <figure class="image is-64x64">
            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
          </figure>
        </div>
        <div class="media-content">
          <div class="content">
            <p>
              <div class="content">
                <p>
                  <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                  <br>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                </p>
              </div>
            </p>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item" aria-label="retweet">
                  <span class="icon is-small">
                    <i class="material-icons">home</i>
                  </span>
                </a>
                <a class="level-item" aria-label="like">
                  <span class="icon is-small">
                    <i class="material-icons">home</i>
                </span>
              </a>
            </div>
          </nav>
        </div>
      </article>
    </div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div> -->
@endsection
