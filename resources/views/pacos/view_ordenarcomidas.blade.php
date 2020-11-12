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
                <form method="post" action="{{ url('pacos/reservar/registrarOrden') }}">  
                  {{ csrf_field() }}
                <div class="columns is-desktop">
                  <div class="column is-12" >
                    <div id="Comidas" class="columns is-desktop flex-container">
                       
                     </div>
                  </div>
                   <input type="hidden" name="idres" value="{{ $reserva->idreserva }}">
                </div>          
                <div class="columns is-desktop">
                  <div class="column is-12">
                    <input class="button is-rounded pacos-btn-enviar" type="submit" value="Pagar reservación">
                  </div>
                </div>
              </form>
        @endif
      @endforeach 
    </article>
  </div>
</div>
@endsection
