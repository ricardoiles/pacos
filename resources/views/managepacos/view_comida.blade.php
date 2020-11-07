@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>
@endsection
@section('content')
    <div class="tile">
      <div class="tile is-parent is-vertical is-3">
        
      </div>
      <div class="tile is-parent pacos-allinfo-pacos">
        <div class="tile pacos-div-allinfo-pacos">
            <article class="box" style="width: 100%">
              
            </article>

        </div>
        <div class="tile pacos-div-allinfo-pacos">
            <article class="box" style="width: 100%; text-align: justify;">
                <b>Descripcion del sitio</b>
                <p>
                
            </article>
        </div>
        <div class="tile pacos-div-allinfo-pacos-last">
            <article class="box" style="width: 100%">
                <b>Contacto</b>
                
            </article>
        </div>
      </div>
    </div>
@endsection
