@extends('layouts.layout_managepacos')
@section('view_estilos')
<link href="{{ asset('css/view_managepacos.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="columns is-desktop">
  <div class="column is-12 pacos-managepacos-hero">
  	<img class="pacos-managepacos-cityimage-hero" src="{{ asset('images/cityPACOS.png') }}">
  </div>
</div>
<div class="columns is-desktop">
  <div class="column is-3 pacos-managepacos-menu">
  	<img class="is-rounded pacos-foto-perfil-pacos" src="https://i.pinimg.com/originals/10/55/ea/1055ea144b35b4ae93a12957b4cd774e.jpg">
  	<div class="pacos-managepacos-menu-namepacos">
  		{{ Auth::user()->name }} 
  	</div>
    <div class="pacos-managepacos-menu-namepacos" style="text-align: left; margin-left: 20%;">
      <p>
        @foreach($pacosinfo as $pacos)
        <a href="{{ url('/manage/'.$pacos->nombre.'/categorias') }}" class="navbar-item">
          <i class="material-icons">category</i>
          Categorias
        </a>
        @endforeach
      </p>
      <p>
        <a href="#EstasEnReservaciones" class="navbar-item is-active-pacos">
          <i class="material-icons">receipt</i>
          Reservaciones
        </a>
      </p>
    </div>
  </div>
  <div class="column is-9">
  	<div class="columns is-desktop">
	  <div class="column is-12">
	  	<nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="{{ url('/home') }}">Mis PACOS</a></li>
          @foreach($pacosinfo as $pacos)
          <li><a href="{{ url('/manage/'.$pacos->nombre.'/categorias') }}">{{ $pacos->nombre }}</a></li>
          @endforeach
          <li class="is-active"><a href="#" aria-current="page">Reservaciones</a></li>
        </ul>
      </nav>
	  </div>
	</div>
  	<div class="columns is-desktop">
  		<div class="column is-12" style="margin: 5px; text-align: center; width: 80%">
        <button class="is-rounded button pacos-btn-total-servicio-reserva">
              Servicio actual: 
              @foreach($pacosinfo as $pacos)
                @if($pacos->tipopacos == 0)
                  ${{ $cantreservas*500 }}
                @endif
                @if($pacos->tipopacos == 1)
                  ${{ $cantreservas*1000 }}
                @endif
                @if($pacos->tipopacos == 2)
                  ${{ number_format($cantreservas*2000) }}
                @endif
              @endforeach
        </button>
  		</div>
	 </div>
   <div class="columns is-desktop flex-container">
      @foreach($reservaciones as $reserva)
        <div class="column is-4 box" style="line-height: 100%; text-align: justify; margin-right: 10px; margin-bottom: 10px; width: 25%;">
          <div class="columns is-desktop">
              @foreach($fotos as $foto)
              <div class="column is-3" style="width: 30%">       
                <img class="pacos-reservas-fotopacos" src="{{ asset('storage'.'/'.$foto->Perfil) }}" style="margin-top: 0%; margin-left: 0px; border-radius: 50%; width: 45px; height: 45px">
              </div>
              @endforeach
              <div class="column is-9" style="margin-left: -10px">
                  <b>{{ $reserva->nombrerest }}</b>
                  <p>Reservacion N° <b>{{ $reserva->idreserva }}</b></p>
                  <p>{{ $reserva->fechareserva }} &middot; {{ $reserva->horareserva }} </p>
                  <p><b>{{ number_format($reserva->total) }}</b> </p>
                  @if($reserva->consincomida == 0)
                    @foreach($pacosinfo as $pacos)
                      <p><a href="{{ url('/pacos/'.$pacos->nombre.'/'.$reserva->idreserva.'/ordenarcomida') }}"><b class="pacos-is-active">Sin comida</b></a></p>
                    @endforeach
                  @else
                    <p><a href="{{ url('/pacos/'.$pacos->nombre.'/'.$reserva->idreserva.'/ordenarcomida') }}"><b style="color: green">Con comida</b></a></p>
                  @endif
              </div>
          </div>
        </div>
      @endforeach
     </div>
  </div>
</div>
@endsection