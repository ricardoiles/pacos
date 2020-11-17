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
                          <p>Fecha: <b>{{ $reserva->fechareserva }}</b></p>
                          <p>Hora: <b>{{ $reserva->horareserva }}</b> </p>
                          <p>Mesa N° <b>{{ $reserva->numero }}</b></p>
                          <p>Con: <b>{{ $reserva->Puestos }}</b> puestos</p>
                          @if($reserva->consincomida == 0)
                          <p><b class="pacos-is-active">Sin comida</b></p>
                          @else
                          <p><b style="color: green; font-size: 14px">Ordenaste comida</b></p>
                          @endif
                      </div>
                  </div>
             </div>
              <div class="column is-9">  
                <div class="columns is-desktop">
                  <div class="column is-12" style="text-align: center;">
                    @if($reserva->consincomida == 1) 
                      <b class="pacos-is-active">Comida ordenada</b>
                    @else
                      <div class="dropdown is-right is-hoverable">
                        <div class="dropdown-trigger">
                          <button class="button is-rounded pacos-btn-selectedfood" title="Agregar comida a la reservación" onclick="modalOpenComida()">
                            <span><i class="material-icons">fastfood</i></span>
                            <span class="icon is-small">
                              <i class="material-icons">add</i>
                            </span>
                          </button>
                        </div>
                        
                      </div>
                    @endif
                  </div>
                </div>  
                
                <div class="columns is-desktop">
                  <div class="column is-12" >
                    @if($reserva->consincomida == 1) 
                      <div class="columns is-desktop flex-container" style="padding-left: 20px">
                        @foreach($comidasordenadas as $orden)
                          <div class='column is-4 box' style='line-height: 100%; text-align: justify; margin-left:20px; margin-right: 5px; margin-bottom: 10px; width: 40%'>
                            <div class='columns is-desktop pacos-div-ordencomida'>
                                <div class='column  pacos-ordenar-col-3-fotocomida'>
                                    <image class='pacos-ordenar-fotocomida' src="{{ asset('storage').'/'.'/'.'/'.$orden->fotocomida }}">
                                </div>
                                  <div class='column is-9' style='font-size: 13px; width: 70%'>
                                      <b>{{ $orden->nombrecomida }}</b>
                                      <p>{{ $orden->ingredientes }}</p>                                                                         
                                      <p><b>Cantidad: <label>{{ $orden->cantorden }}</label> </b> &middot; <b class='pacos-is-active'>${{ $orden->precio }}</b></p>
                                      <input type='hidden' name='sub_total[]' min='1' value='"+cmd.preciocomida/50+"'>
                                      <input type='hidden' name='sub_desc[]' min='1' value='"+cmd.preciocomida*1/100+"'>
                                      <input type='hidden' name='sub_iva[]' min='1' value='"+cmd.preciocomida*7/100+"'>
                                  </div>
                             </div>
                        </div>
                        @endforeach
                      </div>
                      <a href="{{ url('/pacos/'.$reserva->nombrerest.'/reservar') }}">
                        <button class="button is-rounded pacos-btn-volver">Volver</button>
                      </a>
                    @else
                      <form method="post" action="{{ url('pacos/reservar/registrarOrden') }}">  
                        {{ csrf_field() }}
                        
                        <input type="hidden" id="idres" name="idres" value="{{ $reserva->idreserva }}">
                        <input type="hidden" name="nombrepacos" value="{{ $reserva->nombrerest }}">
                        <div id="Comidas" class="columns is-desktop flex-container" style="padding-left: 20px">
                           
                        </div>
                        <input class="button is-rounded pacos-btn-enviar"  type="submit" value="Crear reservación"> <!-- onclick="enviarOrden()" -->
                      </form>
                    @endif
                  </div>
                </div>          
        @endif
      @endforeach 
    </article>
  </div>
</div>

<div id="modal-comidas" class="modal ">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box" style="height: 80vh; width: 100%">
      <p><b class="pacos-is-active">Elegir comida</b></p>
      <p><small>Presiona una o más veces para aumentar la cantidad de cada comida</small></p>
      <br>
      <div class="columns is-desktop flex-container">
        @foreach($comidas as $comida)
          <div class='column is-4 box' style='line-height: 100%; text-align: justify; margin-left: 15px; margin-right: 10px; margin-bottom: 10px; width: 45%'>
            <div class='columns is-desktop pacos-div-ordencomida'>
                <div class='column  pacos-ordenar-col-3-fotocomida'>
                    <image class='pacos-ordenar-fotocomida' src="{{ asset('storage').'/'.'/'.'/'.$comida->fotocomida }}">
                </div>
                  <div class='column is-9' style='font-size: 13px; width: 70%'>
                      <b>{{ $comida->nombrecomida }}</b>
                      <p>{{ $comida->ingredientes }}</p>                                                                         
                      <p>Precio: <b class="pacos-is-active">${{ $comida->preciocomida }}</b></p>
                      <p>
                        <button class="button is-rounded pacos-btn-enviar" onclick="agregarComida({{ $comida->idcomida }})"><i class="material-icons">add</i></button>
                      </p>
                  </div>
             </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="modalCloseComida()"></button>
</div>
@endsection
