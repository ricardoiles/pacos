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
  		<a href="{{ url('/home') }}">Mis PACOS</a> 
  	</div>
  </div>
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-mobile">
	  <div class="column is-12">
	  	<button class="button pacos-btnmenu-pacos">
			<span class="icon is-small">
			    <span class="material-icons">settings</span>
			</span>
		</button>
        <label class="pacos-title-menu">
            Configuraciones
		</label>
	  </div>
	</div>
  	<div class="columns is-mobile">
		<div class="column is-6 box" style="margin: 5px;">
			Multimedia del sitio <br>
			Foto de perfil
			<form method="post" action="{{ url('manage/agregar/detallesPACOS')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">	
					    <input name="Url" class="input" type="file" required="">
					    <input type="hidden" name="Principal" value="0">
					    @foreach($pacosinfo as $pacos)  
					    <input type="hidden" name="id_pacos" value="{{ $pacos->id }}">@endforeach
				        <span class="icon is-small is-left">
				          <i class="material-icons">my_location</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
					    <input class="input" type="submit" value="Guardar">
				      </p>
				    </div>
				  </div>
				</div>
			</form>
			
			Foto de portada
			<form method="post" action="{{ url('manage/agregar/detallesPACOS')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">	
					    <input name="Url" class="input" type="file" required="">
					    <input type="hidden" name="Principal" value="1">
					     @foreach($pacosinfo as $pacos)  
					    <input type="hidden" name="id_pacos" value="{{ $pacos->id }}">@endforeach
				        <span class="icon is-small is-left">
				          <i class="material-icons">my_location</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
					    <input class="input" type="submit" value="Guardar">
				      </p>
				    </div>
				  </div>
				</div>
			</form>
		</div>
		<div class="column is-6 box" style="margin: 5px;">
			Horario
			<form method="post" action="{{ url('manage/agregar/detallesPACOS')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">
				         			
					    	<input name="DIa_Ini" class="input" type="text" placeholder="Día apertura" required="">
					    	<input type="hidden" name="eshorario" value="eshorario">
					    	@foreach($pacosinfo as $pacos)  
					    <input type="hidden" name="id_pacos" value="{{ $pacos->id }}">@endforeach
				        <span class="icon is-small is-left">
				          <i class="material-icons">my_location</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				        			
					    	<input name="Hora_APert" class="input" type="time" placeholder="Hora apertura" required="">
					    
				        <span class="icon is-small is-left">
				          <i class="material-icons">navigation</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">
				         			
					    	<input name="Dia_cierre" class="input" type="text" placeholder="Día cierre" required="">
					    
				        <span class="icon is-small is-left">
				          <i class="material-icons">my_location</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				        			
					    	<input name="Hora_cierre" class="input" type="time" placeholder="Hora cierre" required="">
					    
				        <span class="icon is-small is-left">
				          <i class="material-icons">navigation</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				<div class="field is-horizontal">
				  <div class="field-body">
				    <p class="control">
					    <input class="button" type="submit" value="Editar">
					  </p>
				  </div>
				</div>
			</form>
		</div>
	</div>

	<!-- info redes sociales -->
	<div class="columns is-mobile">
		<div class="column is-12 box" style="margin: 5px;">
			Redes sociales (pega urls)
			<form method="post" action="{{ url('manage/agregar/detallesPACOS')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @foreach($pacosinfo as $pacos)  
					    <input type="hidden" name="id_pacos" value="{{ $pacos->id }}">
					    <input type="hidden" name="namepacos" value="{{ $pacos->nombre }}">@endforeach
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">
				        	<input type="hidden" name="sonredes" value="sonredes">
					    	<input name="facebook" class="input" type="text" placeholder="Facebook" value="" >
					    
				        <span class="icon is-small is-left">
				          <i data-feather="facebook"></i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				        			
					    	<input name="twitter" class="input" type="text" placeholder="Twitter" value="">
					    
				        <span class="icon is-small is-left">
				          <i data-feather="twitter"></i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				        			
					    	<input name="whastapp" class="input" type="text" placeholder="WhastApp" value="" required="">
					    
				        <span class="icon is-small is-left">
				          <i data-feather="phone-call"></i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">
				        			
					    	<input name="youtube" class="input" type="text" placeholder="YouTube" value="">
					    
				        <span class="icon is-small is-left">
				          <i data-feather="youtube"></i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				        			
					    	<input name="instagram" class="input" type="text" placeholder="Instagram" value="">
					    
				        <span class="icon is-small is-left">
				          <i data-feather="instagram"></i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				        			
					    	<input name="sitioweb" class="input" type="text" placeholder="Sitio web externo" value="">
					    
				        <span class="icon is-small is-left">
				          <i data-feather="globe"></i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				<div class="field is-horizontal">
				  <div class="field-body">
				    <div class="field">
				      <p class="control is-expanded has-icons-left">
					    <input class="button" type="submit" value="Guardar">
				      </p>
				    </div>
				  </div>
				</div>
			</form>
		</div>
	</div>
  </div>
</div>
@endsection