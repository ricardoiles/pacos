@extends('layouts.layout_managepacos')
@section('view_estilos')
<link href="{{ asset('css/view_managepacos.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="columns is-mobile">
  <div class="column is-12 pacos-managepacos-hero">
  	<img class="pacos-managepacos-cityimage-hero" src="{{ asset('images/cityPACOS.png') }}">
  </div>
</div>
<div class="columns is-mobile">
  <div class="column is-3 pacos-managepacos-menu">
  	<img class="is-rounded pacos-foto-perfil-pacos" src="https://i.pinimg.com/originals/10/55/ea/1055ea144b35b4ae93a12957b4cd774e.jpg">
  	<div class="pacos-managepacos-menu-namepacos">
  		{{ Auth::user()->name }} 
  	</div>
    <div class="pacos-managepacos-menu-namepacos">
      <a href="#mispacos" class="is-active-pacos">Mis PACOS</a>
    </div>
  </div>
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-mobile">
	  <div class="column is-12">
	  	<button class="button pacos-btnmenu-pacos">
			<span class="icon is-small">
			    <span class="material-icons">home</span>
			</span>
		</button>
    <label class="pacos-title-menu">
            Reservaciones
		</label>
	  </div>
	</div>
  	<div class="columns is-mobile">
  		<div class="column is-12 box" style="margin: 5px; text-align: center;">
        @foreach($pacosinfo as $pacos)
          @if($pacos->tipopacos == 2)
            <!-- @foreach($cantreservas as $cant)
              {{ $cant }}
            @endforeach -->
            {{ $cantreservas }}
          @endif
        @endforeach
        <button class="button pacos-btnmenu-pacos">
          <span class="icon is-small">
              $
          </span>
        </button>
        
        <label class="">
            <a href="{{ url('/manage/nuevo/pacos') }}">Servicio actual: </a>
        </label>
  		</div>
	 </div>
   <div class="columns is-desktop flex-container">
      @foreach($reservaciones as $reserva)
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
              </div>
          </div>
        </div>
      @endforeach
     </div>
  </div>
</div>
@endsection