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
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-desktop">
	  <div class="column is-12">
	  	<nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="{{ url('/home') }}">Mis PACOS</a></li>
          @foreach($pacosinfo as $pacos)
          <li><a href="{{ url('/manage/'.$pacos->nombre.'/categorias') }}">{{ $pacos->nombre }}</a></li>
          @endforeach
          <li class="is-active"><a href="#" aria-current="page">Administracion</a></li>
        </ul>
      </nav>
	  </div>
	</div>
    <div class="columns is-desktop flex-container">
      <div class="column is-1 box" style="border-radius: 50%; height: 100px; width: 100px">
        
      </div>
      hey
    </div>
  </div>
</div>
@endsection