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
  </div>
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-mobile">
	  <div class="column is-12">
	  	<button class="button pacos-btnmenu-pacos">
			<span class="icon is-small">
			    <span class="material-icons">category</span>
			</span>
		</button>
        <label class="pacos-title-menu">
            Categorias
		</label>
	  </div>
	</div>
	<div class="columns is-mobile">
		<div class="column is-12 box" style="margin: 5px;">
			<form method="post" action="{{ url('manage/registrarPACOS')}}">
                {{ csrf_field() }}
               	<input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
				<div class="field is-horizontal">
				  <div class="field-body">
				  	<div class="field">
				  		Agregar categoria
				      <p class="control is-expanded  has-icons-left" >
					    <input class="input" type="text" placeholder="Nombre categoria">
				        <span class="icon is-small is-left">
				          <i class="material-icons">category</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				<div class="field is-horizontal">
				  <div class="field-body">
				  	<div class="field">
				      <p class="control is-expanded has-icons-left">
					    <input name="nombre" class="input" type="file" value="">
				        <span class="icon is-small is-left">
				          <i class="material-icons">home</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      
					    @if(!empty($message))
							<input class="button is-rounded" style="color: green; border: 1px solid green; width: 100%">
						@else
							<a href="{{url('/home')}}" class="button is-rounded" style="width: 30%;">
								Cancelar
							</a>
							<input class="button is-rounded" type="submit" value="Guardar" style="background-color: rgb(210,23,52); color: white; width: 30%;">
						@endif
				      
				    </div>
				  </div>
				</div>
			</form>
		</div>
	</div>
  </div>
</div>
@endsection