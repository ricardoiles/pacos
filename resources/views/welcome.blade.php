@extends('layouts.layout_welcome')
@section('view_estilos')
<link href="{{ asset('css/view_welcome.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="columns is-desktop">
    <div class="column is-12 pacos-hero-section">
        <div class="columns is-desktop">
            <div class="column is-3"></div>
            <div class="column is-6 pacos-search-section">
                
                <div class="field is-horizontal title-responsive-4">
                  <div class="field-body">
                    <div class="field">
                      <p class="title is-4">Hey, ¿Dónde quieres ir a comer hoy?</p>
                    </div>
                  </div>
                </div>
                <br>
                <div class="field is-horizontal fields-herosection">
                  <div class="field-body">
                    <div class="field">
                      <p class="control is-expanded  has-icons-left" >
                        <input name="nombrecomida" class="input pacos-hero--input-search" type="text" placeholder="¿Qué quieres comer?" required="">
                        <span class="icon is-small is-left">
                          <i class="material-icons">fastfood</i>
                        </span>
                      </p>
                    </div>
                    <div class="field">
                      <p class="control is-expanded  has-icons-left" >
                        <input name="precio" class="input pacos-hero--input-search" type="text" value="" placeholder="¿Dónde estás?" required="">
                        <span class="icon is-small is-left">
                          <i class="material-icons">location_on</i>
                        </span>
                      </p>
                    </div>
                    <div class="field">
                      <p class="control is-expanded" >
                        <input class="button is-rounded pacos-registrarme-btn" type="submit" value="Buscar" >
                      </p>
                    </div>
                  </div>
                </div>
                <br>
                <div class="field is-horizontal">
                  <div class="field-body">
                    <div class="field">
                      <button class="button pacos-hero-btn-round">
                          <i class="material-icons">receipt</i>
                      </button>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button class="button pacos-hero-btn-round">
                          <i class="material-icons">room_service</i>
                      </button>
                    </div>
                  </div>
                </div>
            </div>
            <div class="column is-3"></div>
        </div>
        <img src="{{ asset('images/cityPACOS.png') }}" class="pacos-hero-image">
    </div>
</div>
@endsection