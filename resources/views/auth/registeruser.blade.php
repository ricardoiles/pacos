@extends('layouts.layout_log')
@section('view_estilos')
<link href="{{ asset('css/view_login.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="columns is-desktop">
    <div class="column is-8 pacos-log-left" style="text-align: center;">
        <a href="{{ url('/') }}" class="logoPACOS">
            <img src="{{ asset('images/logoPACOS.png') }}" class="pacos-log-logoPACOS"> &nbsp;
            <b class="title is-4">PACOS</b><br>
            <p class="subtitle">Sitios para comer</p>
        </a>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">   
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a href="{{ url('/') }}" class="navbar-item">Sitios cercanos</a>
                    <a href="{{ url('/') }}" class="navbar-item">Sitios destacados</a>
                    <a href="{{ url('/') }}" class="navbar-item">Comidas</a>
                    <a href="{{ route('register') }}" class="navbar-item ">Tengo un sitio de comida</a>
                </div>
                <div class="navbar-end">
                  @if (Auth::guest())
                        
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                <img class="is-rounded pacos-foto-perfil-nav" src="https://media.geeksforgeeks.org/wp-content/uploads/20200617121759/bill-gates.jpg" title="{{ Auth::user()->name }}">
                            </a>
                            <div class="navbar-dropdown is-right">
                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Cerrar sesion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <p class="pacos-log-descripcion">
            Crea un usuario para que puedas <b class="pacos-log-active">encontrar sitios y comidas a tu alrededor</b> o
            descubre qué beneficios obtienes si tienes un sitio para comer.
        </p>
        <br>
        <p>
            <button class="button pacos-hero-btn-round">
                <i class="material-icons" style="font-size: 14px;">receipt</i>
            </button>
            &nbsp;&nbsp;&nbsp;
            <button class="button pacos-hero-btn-round">
              <i class="material-icons" style="font-size: 14px;">room_service</i>
            </button>
        </p>
        <img src="{{ asset('images/cityPACOS.png') }}" class="pacos-hero-image">
    </div>
    <div class="column is-4 pacos-log-right">
        <div class="field is-horizontal pacos-log-titlelog">
            <div class="field-body">
                <div class="field">
                    <p class="title is-5">Registrate</p>
                    <p class="">Nuevo usuario</p>
                </div>
            </div>
        </div>
        <form class="pacos-log-form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input pacos-log-inputs" id="name" type="name" name="name" value="{{ old('name') }}" required="" autofocus placeholder="Nombres (Solo nombres) ">
                            </p>
                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input pacos-log-inputs" id="email" type="email" name="email"
                                   value="{{ old('email') }}" required="" placeholder="Correo electronico">
                        </p>

                        @if ($errors->has('email'))
                            <p class="help is-danger">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input pacos-log-inputs" id="password" type="password" name="password" required="" placeholder="Contraseña">
                        </p>

                        @if ($errors->has('password'))
                            <p class="help is-danger">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input pacos-log-inputs" id="password-confirm" type="password"
                                   name="password_confirmation" required="" placeholder="Confirmar contraseña">
                        </p>
                    </div>
                </div>
            </div>
            <input class="input" id="tipo" type="hidden" name="tipo" value="0">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-rounded pacos-registrarme-btn">Registrarme</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="field is-horizontal" style="text-align: center;">
            <div class="field-body">
                <div class="field">
                    <p>&nbsp;</p>
                    <p class="">O</p>
                    <p class="">
                        <a href="{{ route('login') }}">
                            <b class="pacos-log-active">Iniciar sesion</b>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
