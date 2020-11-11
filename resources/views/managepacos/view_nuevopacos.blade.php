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
	  	<nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
          	<li class="is-active"><a href="#" aria-current="page">Inicio</a></li>
            <li><a href="#">Crear nuevo PACOS</a></li>            
          </ul>
        </nav>
	  </div>
	</div>
  	<!-- mas infor abajo -->
	<div class="columns is-mobile">
		<div class="column is-12 box" style="margin: 5px;">
			<form method="post" action="{{ url('manage/registrarPACOS')}}">
                {{ csrf_field() }}
               	<input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
				<div class="field is-horizontal">
				  <div class="field-body">
				  	<div class="field">
				  		perfil
				      <p class="control is-expanded  has-icons-left" >
					    <select class="input" name="categoria" style="cursor: pointer;">
					    	@foreach($categorias as $category)
						    	<option value="{{ $category->id }}">{{ $category->Nombre }}</option>
						    @endforeach
						</select>
				        <span class="icon is-small is-left">
				          <i class="material-icons">category</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				    	Contacto
				      <p class="control is-expanded has-icons-left has-icons-right">
					    <input name="email" class="input" type="mail" placeholder="Email" value="" required="">
				        <span class="icon is-small is-left">
				          <i class="material-icons">email</i>
				        </span>
				      </p>
				    </div>

				    <div class="field">
				    	Ubicación
				      <p class="control is-expanded has-icons-left">
					    <select class="input" name="pais" style="cursor: pointer;">
					    	
					    	@foreach($paises as $pais)
						    	<option value="{{ $pais->Nombre }}">{{ $pais->Nombre }}</option>
						    @endforeach
						</select>				    
				        <span class="icon is-small is-left">
				          <i class="material-icons">my_location</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				    	&nbsp;
				      <p class="control is-expanded has-icons-left" >
					    <select class="input" name="ciudad" style="cursor: pointer;">
					    	
					    	@foreach($city as $ciudad)
						    	<option value="{{ $ciudad->id }}">{{ $ciudad->Nombre }}</option>
						    @endforeach
						</select>
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
					    <input name="nombre" class="input" type="text" placeholder="Nombre del PACOS" value="">
				        <span class="icon is-small is-left">
				          <i class="material-icons">home</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				    	<input name="telefono" class="input" type="text" placeholder="Telefono" value="">
				        <span class="icon is-small is-left">
				          <i class="material-icons">phone</i>
				        </span>
				      </p>
				    </div>

				    <div class="field">
				      <p class="control is-expanded has-icons-left">
				        
					    	<input name="BarrioVere" class="input" type="text" placeholder="Barrio o vereda" value="">
					    
				        <span class="icon is-small is-left">
				          <i class="material-icons">pin_drop</i>
				        </span>
				      </p>
				    </div>
				    <div class="field">
				      <p class="control is-expanded has-icons-left has-icons-right">
				          			
					    	<input name="direccion" class="input" type="text" placeholder="Dirección" value="">
					    
				        <span class="icon is-small is-left">
				          <i class="material-icons">place</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
		</div>
	</div>
	<!-- mas infor abajo -->
	<div class="columns is-mobile">
		<div class="column is-4 box" style="margin: 5px;">
			Descripción (será publica)
			<div class="field">
			  <textarea class="textarea" placeholder="Añade una descripcion de tu sitio (max 200 caracteres)" maxlength="200" minlength="10" name="Descripcion" required="" rows="3"></textarea>
			</div>
		</div>
		<div class="column is-4 box" style="margin: 5px;">
			Datos PACOS
			<div class="field is-horizontal">
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded">
			    	<input name="nit" id="Nit" class="input" type="number" placeholder="Nit" value="" required="">		    
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded">
			    	<input name="DigVer" maxlength="9" minlength="0" class="input" type="number" placeholder="Digito de verificacion" value="" required="">
			      </p>
			    </div>
			  </div>
			</div>
			<div class="field is-horizontal">
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left has-icons-right">
			    	<input name="Capacidad" class="input" type="number" placeholder="Capacidad personas" value="" required="">
			        <span class="icon is-small is-left">
			          <i class="material-icons"></i>
			        </span>
			      </p>
			    </div>
			  </div>
			</div>
			<!-- <div class="field is-horizontal">
			  <div class="field-body">
			    <div class="field">
			    	Foto de perfil
			      <p class="control is-expanded has-icons-left has-icons-right">
			    	<input class="input" type="file" name="FotoPerfil" value="" required="">
			    	<span class="icon is-small is-left">
			          <i class="material-icons">photo</i>
			        </span>
			      </p>
			      
			    </div>
			    <div class="field">
			    	fotos de portada
			      <p class="control is-expanded has-icons-left has-icons-right">
			    	<input class="input" type="file" name="FotoPortada" value="" required="">
			    	<span class="icon is-small is-left">
			          <i class="material-icons">photo_size_select_actual</i>
			        </span>
			      </p>
			    </div>
			  </div>
			</div> -->
		</div>
		<div class="column is-4 box" style="margin: 5px;">
			Lo que ofreces 
			<div class="field">
			  <p class="control has-icons-left">
		    	<div class="field">		    		
			  		<input id="Domicilios" type="checkbox" name="domicilios" class="switch is-rounded is-danger" value="0" onclick='CmbValue("Domicilios")'>
			  		<label for="Domicilios">Domicilios </label>
				</div>			
			    <div class="field">
			  		<input id="Reservar" type="checkbox" name="reservas" class="switch is-rounded is-danger" value="0" onclick='CmbValue("Reservar")'>
				  <label for="Reservar">Reservar mesas</label>
				</div> 			
			    <div class="field">
			  		<input id="Ordenar" type="checkbox" name="ordenes" class="switch is-rounded is-danger" value="0" onclick='CmbValue("Ordenar")'>
				  <label for="Ordenar">Ordenar comida</label>
				</div>
			  </p>
			</div>
		</div>		
	</div>
	<!-- info redes sociales -->
	<div class="columns is-mobile">
		<div class="column is-12 box" style="margin: 5px; text-align: center;">
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
		</div>
	</div>
	</form>
  </div>
</div>
@endsection