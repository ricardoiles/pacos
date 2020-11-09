@extends('layouts.layout_panelusuario')
@section('view_estilos')
<link href="{{ asset('css/view_panelusuario.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- <div class="tile is-ancestor">
  <div class="tile is-vertical is-12">
    <div class="tile">
      <div class="tile is-parent is-3">
        <article class="tile is-child box">
          <p class="title">¿A dónde iras hoy?</p>
          <div class="content">
            <p>un item del menu</p>
            <p>un item del menu</p>
            <p>un item del menu</p>
          </div>
        </article>
      </div>
      <div class="tile is-vertical">
        <div class="tile">
          <div class="tile is-parent is-12">
            <article class="tile is-child box-pacos">
                <div class="columns">
                  <div class="column">
                    <div class="box">
                      Hola <b>{{ Auth::user()->name }}</b> Aqui puedes hacer la reseña directa sobre un sitio de comida
                    </div>
                  </div>
                </div>
            </article>
          </div>
        </div>
        <div class="tile">
          <div class="tile is-parent is-12">
            <article class="tile is-child box">
                
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="columns is-mobile">
  <div class="column is-3">
    <code>is-three-quarters-mobile</code><br>
    <code>is-two-thirds-tablet</code><br>
    <code>is-half-desktop</code><br>
    <code>is-one-third-widescreen</code><br>
    <code>is-one-quarter-fullhd</code>
  </div>
  <div class="column is-9">2</div>
</div>
@endsection

