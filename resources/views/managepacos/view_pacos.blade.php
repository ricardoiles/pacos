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
    <!-- <div class="pacos-managepacos-menu-namepacos">
      <a href="#pacosinfo" class="is-active-pacos">Mis PACOS</a>
    </div> -->
  </div>
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-desktop">
	  <div class="column is-12">
	  	<button class="button pacos-btnmenu-pacos">
			<span class="icon is-small">
			    <span class="material-icons">home</span>
			</span>
		</button>
    <label class="pacos-title-menu">
            Mis sitios de comida
		</label>
	  </div>
	</div>
  	<div class="columns is-desktop">
  		<div class="column is-12 box" style="margin: 5px; text-align: center;">
        <button class="button pacos-btnmenu-pacos">
          <span class="icon is-small">
              <span class="material-icons">add</span>
          </span>
        </button>
        <label class="">
            <a href="{{ url('/manage/nuevo/pacos') }}">Agregar nuevo PACOS</a>
        </label>
  		</div>
	 </div>
   <div class="columns is-desktop">
    <div class="column is-12 flex-container" style="max-width: 100%">
        @foreach($sitios as $pacoscreados) 
        <div class="column is-4">
          <div class="card">
            <header class="card-header">
              <p class="card-header-title">
                <img src="{{ asset('storage'.'/'.$pacoscreados->fotoperfil) }}" style="width: 30px; height: 30px; border-radius: 50%"> &nbsp; 
                <b>{{ $pacoscreados->nombrepacos }}</b>   
              </p>
              <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                  <i class="material-icons" aria-hidden="true">keyboard_arrow_down</i>
                </span>
              </a>
            </header>
            <div class="card-content" style="height: 100px; max-height: 100px">
              <div class="content">
                {{ $pacoscreados->descripcion }}
              </div>
            </div>
            <footer class="card-footer">
              
              <a href="{{ url('/manage/'.$pacoscreados->nombrepacos.'/categorias') }}" class="card-footer-item">Administrar</a>
              
              <a href="{{ action('PerfilpacosController@show', ['namepacos' => $pacoscreados->nombrepacos]) }}" class="card-footer-item">Visitar</a>
              
            </footer>
          </div>
        </div>
        @endforeach
    </div>
   </div>
  </div>
</div>
@endsection