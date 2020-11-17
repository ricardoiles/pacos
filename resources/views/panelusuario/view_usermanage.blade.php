@extends('layouts.layout_usermanage')
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
        <a href="#EstasEnCategorias" class="navbar-item is-active-pacos">
          <i class="material-icons">category</i>
          Categorias
        </a>
      </p>
      <p>
        <a href="" class="navbar-item">
          <i class="material-icons">receipt</i>
          Reservaciones
        </a>
      </p>
    </div>
  </div>
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-mobile">
	  <div class="column is-12">
	  	<nav class="breadcrumb" aria-label="breadcrumbs">
  		  <ul>
  		    <li><a href="">Administrar</a></li>
  		    <li class="is-active"><a href="#" aria-current="page">Editar perfil</a></li>
  		  </ul>
  		</nav>
	  </div>
	</div>
  	<!-- mas infor abajo -->
  	<form method="post" action="{{ url('user/manage/edit')}}">
		{{ csrf_field() }}
		@foreach($users as $user)
			<div class="columns is-desktop">
				<div class="column is-6 box" style="margin: 5px;">
		           	<input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
					<div class="field is-horizontal">
					  <div class="field-body">
					    <div class="field">
					    	Nombres
					      <p class="control is-expanded has-icons-left">
						    <input name="nombres" class="input" type="text" placeholder="Nombres" value="{{ $user->name }}" required="">
					        <span class="icon is-small is-left">
					          <i class="material-icons">person</i>
					        </span>
					      </p>
					    </div>
					    <div class="field">
					    	Apellidos
					      <p class="control is-expanded has-icons-left">
						    <input name="apellidos" class="input" type="text" placeholder="Apellidos" value="{{ $user->apellidos }}" required="">
					        <span class="icon is-small is-left">
					          <i class="material-icons">info</i>
					        </span>
					      </p>
					    </div>
					  </div>
					</div>
				</div>
				<div class="column is-6 box" style="margin: 5px;">
					<div class="field is-horizontal">
					  <div class="field-body">
					    <div class="field">
					    	Correo electronico
					      <p class="control is-expanded has-icons-left">
						    <input name="email" class="input" type="email" placeholder="Email" value="{{ $user->email }}" required="">
					        <span class="icon is-small is-left">
					          <i class="material-icons">email</i>
					        </span>
					      </p>
					    </div>
					    <div class="field">
					    	Contraseña
					      <p class="control is-expanded has-icons-left">
						    <input name="contraseña" class="input" type="text" placeholder="Contraseña" value="{{ $user->contrasena }}" required="">
					        <span class="icon is-small is-left">
					          <i class="material-icons">vpn_key</i>
					        </span>
					      </p>
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<div class="columns is-desktop">
				<div class="column is-6 box" style="margin: 5px;">
		           	<input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
					<div class="field is-horizontal">
					  <div class="field-body">
					    <div class="field">
					    	Telefono
					      <p class="control is-expanded has-icons-left">
						    <input name="telefono" class="input" type="number" placeholder="Telefono" value="{{ $user->telefono }}" required="">
					        <span class="icon is-small is-left">
					          <i class="material-icons">phone</i>
					        </span>
					      </p>
					    </div>
					    <div class="field">
					    	Ciudad
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
				</div>
			</div>
			<div class="columns is-desktop">
			<div class="column is-12" style="margin: 5px;">
				<input type="submit" name="" value="Guardar" class="button is-rounded" style="width: 100%">
			</div>
		@endforeach
	</form>
  </div>
</div>
@endsection