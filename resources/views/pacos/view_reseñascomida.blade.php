@extends('layouts.layout_perfilpacos')
@section('view_estilos')
<link href="{{ asset('css/view_perfilpacos.css') }}" rel="stylesheet">
@endsection

@section('is-active-1')
is-active-pacos
@endsection

@section('is-btn-selected')
pacos-btnmenu-pacos
@endsection

@section('is-btn-selected-comida')
pacos-btnoptions--infobasica-pacos
@endsection

@section('is-btn-selected-reseñas')
pacos-btnmenu-pacos
@endsection

@section('content')
<div class="tile">
  <div class="tile is-parent is-vertical is-3">
    
  </div>
  <div class="tile pacos-multimediadiv-pacos" style="margin-top: -40px;">
    <article class="box pacos-box-reservayorden" style="width: 100%">
        <div class="columns is-desktop">
          
             <div class="column is-3 pacos-seccion-detalles-reserva pacos-box-responsive-comida">
                <div id="Comidas" class="columns is-desktop flex-container">
                  @foreach($comidas as $comida)
                    <div class='column is-4 pacos-comida pacos-box-comida' style="width: 80%">
                      <div class='columns is-desktop'>
                        <div class='column is-3' style="width: 50%">
                            <image style="width: 50px; height: 50px" class='pacos-ordenar-fotocomida pacos-reseñaxcom' src="{{ asset('storage'.'/'.'/'.'/'.$comida->fotocomida) }}">
                        </div>
                        <div class='column is-9 pacos-column-infocomida'>
                            <b> {{ $comida->nombrecomida }} </b>
                            <p>{{ $comida->ingredientes }}</p>                            
                            <p><b class='pacos-is-active'>${{ $comida->preciocomida }}</b></p>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
             </div>
              <div class="column is-9">  
                <div class="columns is-desktop">
                  <div class="column is-12" style="text-align: center;">
                      <b class="pacos-is-active">Reseñas de comida</b>
                  </div>
                </div>  
                
                <div class="columns is-desktop">
                  <div class="column is-12" >
                    <div class="columns is-desktop flex-container" style="overflow-y: auto; height: 200px">
                    @foreach($reseñasxcomida as $resxcom)
                        <div class="column is-12 box pacos-box-reseña">
                            <div class="columns is-desktop">
                                <div class="column is-2 pacos-column-imageuser ">
                                    <img src="https://source.unsplash.com/user/erondu/1600x900" title="user" style="width: 50px;height: 50px;border-radius: 50%">
                                </div>
                                <div class="column is-10 pacos-column-inforeseña">
                                    <p><b> {{ $resxcom->nameuser }} {{ $resxcom->lastnameuser }} &rsaquo;
                                    @foreach($comidas as $comida) {{ $comida->nombrecomida }} @endforeach </b></p>
                                    <p><small>{{ $resxcom->hora }} &middot; {{ $resxcom->fecha }}</small></p>
                                    <p>{{ $resxcom->reseña }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   </div>                       
                      <!-- <a href="{{ url('/pacos/reservar') }}">
                        <button class="button is-rounded pacos-btn-volver">Volver</button>
                      </a> -->
                      <form method="post" action="{{ url('pacos/store/resenas/comidas') }}">
                        {{ csrf_field() }}
                        <div class="columns is-desktop ">
                          @foreach($pacosinfo as $pacos)
                            <div class="column is-12">
                                <div class="field is-horizontal">
                                  <div class="field-body">
                                    <div class="field" style="flex-grow: 0; width: 50px">
                                        <img src="{{ asset('images/user.png') }}" style="width: 40px;height: 40px;border-radius: 50%" title="Postear como: {{ auth()->user()->name }}">
                                    </div>
                                    <div class="field pacos-input-nuevareseña" style="flex-grow: 0; width: 100%">
                                        <input type="hidden" name="idpacos" value="{{ $pacos->idrest }}">
                                        <input type="hidden" name="namepacos" value="{{ $pacos->nombre }}">
                                        <input type="hidden" name="idcomida" value="@foreach($comidas as $comida) {{ $comida->idcomida }} @endforeach">
                                        <input type="hidden" name="iduser" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
                                        <input type="hidden" name="hora" value="{{ date('h:i:s', strtotime('- 1 minute')) }}">
                                        <input class="input" type="text" name="reseña" placeholder="Escribe aqui tu reseña sobre esta comida" required="" style="border-radius: 20px" maxlength="198">
                                    </div>
                                    <div class="field pacos-button-nuevareseña" style="flex-grow: 0;">
                                        <input class="button pacos-btn-postear" type="submit" value="&#10148;" title="Postear">
                                    </div>
                                  </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                      </form>
                  </div>
                </div>          
       
    </article>
  </div>
</div>
@endsection
