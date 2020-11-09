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
      <a href="{{ url('/home') }}" class="is-active-pacos">Mis PACOS</a><br>
      <a href="{{ url('/home') }}" class="">Opción</a><br>
      <a href="{{ url('/home') }}" class="">Otra opción</a><br>
    </div>
  </div>
  <div class="column is-9" style="width: 65%">
  	<div class="columns is-mobile">
	  <div class="column is-12">
	  	<nav class="breadcrumb" aria-label="breadcrumbs">
		  <ul>
		    <li><a href="{{ url('/home') }}">Mis PACOS</a></li>
		    @foreach($pacosinfo as $pacos)
		    <li><a>{{ $pacos->nombre }}</a></li>
		    @endforeach
		    <li class="is-active"><a href="#" aria-current="page">Categorias</a></li>
		  </ul>
		</nav>
	  </div>
	</div>
  	<!-- mas infor abajo -->
  	<div class="columns is-mobile">
  		<div class="column is-12 box" style="margin: 5px; text-align: center;">
        <button class="button pacos-btnmenu-pacos">
          <span class="icon is-small">
              <span class="material-icons">add</span>
          </span>
        </button>
        <a class="" onclick="modalOpen()">
            Agregar Categoria
        </a>
  		</div>
	</div>
	<div class="columns is-mobile flex-container">
		@foreach($categoriasinfo as $categoria)
	    <div class="column is-2" style="text-align: center;">  
	    	<div class="navbar-item has-dropdown is-hoverable" style="position: absolute;float: right; margin: 0px 100px; cursor: pointer;">
                <i class="material-icons" aria-haspopup="true" aria-controls="dropdown-menu4">more_vert</i>
                <div class="navbar-dropdown is-right">
                    <a class="navbar-item" href="">
                        Editar
                    </a>
                    <a class="navbar-item" href="">
                        Eliminar
                    </a>
                </div>
            </div>
            @foreach($pacosinfo as $pacos)
	    		<a href="{{ url('/manage/'.$pacos->nombre.'/'.$categoria->nombrecategoria.'/comida') }}">
	    	@endforeach
			<img src="{{ asset('storage').'/'.'/'.$categoria->fotocategoria  }}" style="border-radius: 50%; width: 70px; height: 70px">
			<br>
			{{ $categoria->nombrecategoria }}
			</a>
	    </div>
	    
	    @endforeach
   	</div>
  </div>
</div>
<div class="modal" id="modalAddCategory">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Agregar nueva categoria</p>
      <button class="delete" aria-label="close" onclick="modalClose()"></button>
    </header>
    <section class="modal-card-body">
      <div class="columns is-mobile">
		<div class="column is-12 box" style="margin: 5px;">
			<form method="post" action="{{ url('manage/categorias/registrarCategoria')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
               	<input type="hidden" name="id_pacos" value="">
               	@foreach($pacosinfo as $pacos)  
					<input type="hidden" name="id_pacos" value="{{ $pacos->idrest }}">
					<input type="hidden" name="namepacos" value="{{ $pacos->nombre }}">
				@endforeach
				<div class="field is-horizontal">
				  <div class="field-body">
				  	<div class="field">
				      <p class="control is-expanded  has-icons-left" >
					    <input name="Descripcion" class="input" type="text" placeholder="Nombre categoria">
				        <span class="icon is-small is-left">
				          <i class="material-icons">category</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
				Imagen de la categoria
				<div class="field is-horizontal">
				  <div class="field-body">
				  	<div class="field">
				      <p class="control is-expanded has-icons-left">
					    <input name="Foto" class="input" type="file" value="">
				        <span class="icon is-small is-left">
				          <i class="material-icons">home</i>
				        </span>
				      </p>
				    </div>
				  </div>
				</div>
		</div>
	</div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" class="button is-rounded" value="Agregar" style="background-color: rgb(210,23,52); color: white; width: 100%;">
    </footer>
	</form>
  </div>
</div>
@endsection