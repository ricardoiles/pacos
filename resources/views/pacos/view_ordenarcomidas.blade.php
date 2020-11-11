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
             <div class="column is-3" style="line-height: 100%; text-align: justify; height: auto; border-right: 1px solid slategray">
                  <div class="columns is-desktop">
                      @foreach($fotos as $foto)
                      <div class="column is-3">
                          <div class="pacos-reservas-fotopacos" style="background-image: url('{{ asset('storage'.'/'.$foto->Perfil) }}');margin-top: 20%"></div>
                      </div>
                      @endforeach
                      <div class="column is-9" style="padding-left: 20px">
                          <b>{{ $reserva->nombrerest }}</b>
                          <p>Reservacion N° <b>{{ $reserva->idreserva }}</b></p>
                          <p>{{ $reserva->fechareserva }} &middot; {{ $reserva->horareserva }} </p>
                          @if($reserva->consincomida == 0)
                          <p><b class="pacos-is-active">Sin comida</b></p>
                          @endif
                      </div>
                  </div>
             </div>
             <div class="column is-9">
               aqui las comidas
             </div>
          @endif
          @endforeach
        </div>
    </article>
  </div>
</div>
@endsection
