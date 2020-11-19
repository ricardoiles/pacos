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
              ${{ number_format($cantreservas*500) }}
            @endif
            @if($pacos->tipopacos == 1)
              ${{ number_format($cantreservas*1000) }}
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
      <div class="btn-epayco" style="position: fixed;float: right; right: 20%; top:90%">
        @foreach($pacosinfo as $pacos)
            @if($pacos->tipopacos == 0)
              <input type="hidden" name="" value="{{ $costo = 500 }}">
            @endif
            @if($pacos->tipopacos == 1)
              <input type="hidden" name="" value="{{ $costo = 1000 }}">
            @endif
            @if($pacos->tipopacos == 2)
              <input type="hidden" name="" value="{{ $costo = 2000 }}">
            @endif
          <form>
           
            <script
              src="https://checkout.epayco.co/checkout.js"
              class="epayco-button"
              data-epayco-button="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/boton_de_cobro_epayco3.png"
              data-epayco-key="61b9ceb846023f956ce0c7a6de452b6f"
              data-epayco-amount="{{ $cantreservas*$costo }}"
              data-epayco-name="Servicio por reservaciones"
              data-epayco-description="Servicio por reservaciones"
              data-epayco-currency="cop"
              data-epayco-country="co"
              data-epayco-test="true"
              data-epayco-external="false"
              
              data-epayco-extra1="@foreach($reservaciones as $reserva){{ $reserva->idreserva.',' }}@endforeach"
              data-epayco-extra2="{{$pacos->idrest}}"
              data-epayco-response="http://192.168.100.2:8000/{{$pacos->nombre}}/{{$pacos->idrest}}/epayco/respuesta"
              data-epayco-confirmation="http://192.168.100.2:8000/epayco/confirmacion"
              >
            </script>
           
          </form>
        @endforeach
      </div>
     </div>
  </div>
</div>
@endsection