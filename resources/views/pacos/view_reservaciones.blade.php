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
        <article class="box" style="width: 100%;">
            <b></b>
            <br>
            <div class="tabs is-left main-menu" id="nav">
                <ul>
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
            <div class="tab-content">
                <div class="tab-pane is-active flex-container" id="pane-1">
                   <div class="columns is-desktop">
                    @foreach($reservaciones as $reserva)
                       <div class="column is-7 box" style="line-height: 100%; text-align: justify;">
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
                                    <p><b class="pacos-is-active">Sin comida</b></p>
                                    @endif
                                </div>
                            </div>
                       </div>
                    @endforeach
                   </div>
                </div>
                <div class="tab-pane" id="pane-2">
                    <div class="columns is-desktop">
                        <div class="column is-4 box">
                            <div class="columns is-desktop">
                                @foreach($fotos as $foto)
                                <div class="column is-3">
                                    <div class="pacos-reservas-fotopacos" style="background-image: url('{{ asset('storage'.'/'.$foto->Perfil) }}');margin-top: 20%"></div>
                                </div>
                                @endforeach
                                <div class="column is-9">
                                    <form method="post" action="{{ url('pacos/reservar/nueva') }}">
                                        {{ csrf_field() }}
                                        @foreach($pacosinfo as $pacos)
                                            <b>{{ $pacos->nombre }}</b>
                                            <input type="hidden" name="idrest" value="{{ $pacos->idrest }}">
                                            <p>
                                                <small>{{ $pacos->category }}</small>
                                            </p>
                                        @endforeach
                                        <select name="mesa">
                                            @foreach($mesasxrest as $mesa)
                                                <option value="{{ $mesa->idmesa }}"> Mesa N° {{ $mesa->numeromesa }}  &middot; {{ $mesa->puestosmesa }} puestos </option>
                                            @endforeach
                                        </select>
                                        <p>
                                            <input type="date" name="fecha" required="" placeholder="Fecha reservación">
                                        </p>
                                        <p>
                                            <input type="time" name="horainicio" required="">
                                            <input type="time" name="horafin" required="">
                                        </p>
                                        <p>
                                            <input type="text" name="quienreserva" required="" placeholder="Quién reserva" value="{{ Auth::user()->name }}">
                                            <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                                        </p>
                                        <p>
                                            <input type="number" name="telefono" required="" placeholder="Telefono">
                                        </p>
                                        <p>
                                            <input type="number" name="cedula" required="" placeholder="Numero de identificación">
                                        </p>
                                        <p>
                                            <input type="number" name="cantpersonas" required="" placeholder="Cantidad personas">
                                        </p>
                                        <p>
                                            <textarea name="infoadicional" placeholder="Añada aqui información adicional que considere necesaria" rows="3"></textarea>
                                        </p>
                                        <p>
                                            <input type="number" name="totaliva" required="" placeholder="Total IVA">
                                            <input type="number" name="totaldcto" required="" placeholder="Total descuento">
                                            <input type="number" name="valortotal" required="" placeholder="Valor Total">
                                        </p>
                                        <p>
                                            <input type="submit" value="Reservar">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="column is-8" style="background-color: slategray">
                            
                        </div>
                    </div>
                </div>
            </div>
        
        </article>
  </div>
</div>
@endsection
