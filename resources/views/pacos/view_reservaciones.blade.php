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

@section('is-btn-selected-reseñas')
pacos-btnmenu-pacos
@endsection

@section('content')
<div class="tile">
  <div class="tile is-parent is-vertical is-3">
    
  </div>
  <div class="tile pacos-multimediadiv-pacos" style="margin-top: -40px;">
        <article class="" style="width: 100%;">
            <b></b>
            <br>
            <div class="tabs is-left main-menu" id="nav" style="margin-top: -30px">
                <ul style="border-bottom-style: none;">
                    <li data-target="pane-1" class="is-active" id="1">
                        <a>
                            <span class="icon is-small"><span class="material-icons">receipt_long</span></span>
                            <span>Reservaciones</span>
                        </a>
                    </li>
                    <li data-target="pane-2" id="2">
                        <a>
                            <span class="icon is-small"><span class="material-icons">post_add</span></span>
                            <span>Hacer una reservacion</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content"  style="background-color: inherit;">
                <div class="tab-pane is-active " id="pane-1">
                   <div class="columns is-desktop flex-container">
                    @foreach($reservaciones as $reserva)
                    @if($reserva->iduser == Auth::user()->id)
                       <div class="column is-4 box" style="line-height: 100%; text-align: justify; margin-right: 10px; margin-bottom: 10px;">
                            <div class="columns is-desktop">
                                @foreach($fotos as $foto)
                                <div class="column is-3">
                                    <div class="pacos-reservas-fotopacos" style="background-image: url('{{ asset('storage'.'/'.$foto->Perfil) }}');margin-top: 20%"></div>
                                </div>
                                @endforeach
                                <div class="column is-9">
                                    <b>{{ $reserva->nombrerest }}</b>
                                    <p>Reservacion N° <b>{{ $reserva->idreserva }}</b></p>
                                    <p>{{ $reserva->fechareserva }} &middot; {{ $reserva->horareserva }} </p>
                                    @if($reserva->consincomida == 0)
                                      @foreach($pacosinfo as $pacos)
                                        <p><a href="{{ url('/pacos/'.$pacos->nombre.'/'.$reserva->idreserva.'/ordenarcomida') }}"><b class="pacos-is-active">Ordenar comida</b></a></p>
                                      @endforeach
                                    @else
                                      <p><a href="{{ url('/pacos/'.$pacos->nombre.'/'.$reserva->idreserva.'/ordenarcomida') }}"><b style="color: green">Ordenaste comida</b></a></p>
                                    @endif
                                </div>
                            </div>
                       </div>
                    @endif
                    @endforeach
                   </div>
                </div>
                <div class="tab-pane" id="pane-2">
                    <div class="columns is-desktop">
                        <div class="column is-12" style="line-height: 100%">
                            <div class="columns is-desktop">
                                @foreach($fotos as $foto)
                                <div class="column is-1">
                                    <div class="pacos-reservas-fotopacos" style="background-image: url('{{ asset('storage'.'/'.$foto->Perfil) }}');margin-top: 20%"></div>
                                </div>
                                @endforeach
                                <div class="column is-11">
                                    <form method="post" action="{{ url('pacos/reservar/nueva') }}">
                                        {{ csrf_field() }}
                                        @foreach($pacosinfo as $pacos)
                                            <b>{{ $pacos->nombre }}</b> &middot; <small>{{ $pacos->category }}</small>
                                            <input type="hidden" name="idrest" value="{{ $pacos->idrest }}">
                                            <input type="hidden" name="namepacos" value="{{ $pacos->nombre }}">
                                        @endforeach
                                        <br>
                                        <div class="field is-horizontal">
                                          <div class="field-body">
                                            <div class="field">
                                                <small>Fecha Reservacion</small>
                                              <p class="control is-expanded">    
                                                <input class="input" type="date" name="fecha" required="" placeholder="Fecha reservación" required="">
                                              </p>
                                            </div>
                                            <div class="field">
                                                <small>Hora Inicio</small>
                                              <p class="control is-expanded">
                                                <input class="input" type="time" name="horainicio" required="">
                                              </p>
                                            </div>
                                            <div class="field">
                                                <small>Hora fin (duracion espera reservacion)</small>
                                              <p class="control is-expanded">
                                                <input class="input" type="time" name="horafin" required="">
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="field is-horizontal">
                                          <div class="field-body">
                                            <div class="field">
                                                <small>Elige la mesa</small>
                                              <p class="control is-expanded">
                                                <div class="select">
                                                  <select name="mesa">
                                                      @foreach($mesasxrest as $mesa)
                                                          <option value="{{ $mesa->idmesa }}"> Mesa N° {{ $mesa->numeromesa }}  &middot; {{ $mesa->puestosmesa }} puestos </option>
                                                      @endforeach
                                                  </select>
                                                </div>
                                              </p>
                                            </div>
                                            <div class="field">
                                                <small>¿Quién reserva?</small>
                                              <p class="control is-expanded ">
                                                <input class="input" type="text" name="quienreserva" required="" placeholder="Quién reserva" value="{{ Auth::user()->name }}">
                                                <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                                              </p>
                                            </div>
                                            <div class="field">
                                                <small>Teléfono</small>
                                              <p class="control is-expanded ">
                                                <input class="input" type="number" name="telefono" required="" placeholder="Telefono">
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="field is-horizontal">
                                          <div class="field-body">
                                            <div class="field">
                                                <small>Número de identificación</small>
                                              <p class="control is-expanded ">
                                                <input class="input" type="number" name="cedula" required="" placeholder="Numero de identificación">
                                              </p>
                                            </div>
                                            <div class="field">
                                                <small>¿Reservación para cuántas personas?</small>
                                              <p class="control is-expanded ">
                                                <input class="input" type="number" name="cantpersonas" required="" placeholder="Cantidad personas">
                                              </p>
                                            </div>
                                            <div class="field">
                                                <small>Información adicional (opcional)</small>
                                              <p class="control is-expanded ">
                                                <textarea class="input" name="infoadicional" placeholder="Añada aqui información adicional que considere necesaria" rows="3"></textarea>
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                        <input class="input" type="hidden" name="totaliva" required="" placeholder="Total IVA" value="100" readonly="">
                                        <input class="input" type="hidden" name="totaldcto" required="" placeholder="Total descuento" value="150" readonly="">
                                        <input class="input" type="hidden" name="valortotal" required="" placeholder="Valor Total" value="1.000" readonly="">
                                        
                                        <div class="field is-horizontal">
                                          <div class="field-body">
                                            <div class="field">
                                              <p class="control is-expanded ">
                                                <input class="button is-rounded pacos-btn-enviar" type="submit" value="Reservar">
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </article>
  </div>
</div>
@endsection
