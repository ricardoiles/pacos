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
	    <div class="column is-3" style="max-width: 100%">  
	    	<div class="box">
			  <article class="media">
			    <div class="media-left">
			      <figure class="image is-64x64">
			        <img src="{{ asset('storage').'/'.'/'.$categoria->fotocategoria  }}" alt="Image">
			      </figure>
			    </div>
			    <div class="media-content">
			      <div class="content">
			        <p>
			          <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
			        </p>
			      </div>
			      <nav class="level is-mobile">
			        <div class="level-left">
			          <a class="level-item" aria-label="reply">
			            <span class="icon is-small">
			              <i class="material-icons">home</i>
			            </span>
			          </a>
			          <a class="level-item" aria-label="retweet">
			            <span class="icon is-small">
			              <i class="material-icons">home</i>
			            </span>
			          </a>
			          <a class="level-item" aria-label="like">
			            <span class="icon is-small">
			              <i class="material-icons">home</i>
			            </span>
			          </a>
			        </div>
			      </nav>
			    </div>
			  </article>
			</div>      
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
      <button class="button is-rounded" onclick="modalClose()" style="width: 50%">Cancelar</button>
      <input type="submit" class="button is-rounded" value="Agregar" style="background-color: rgb(210,23,52); color: white; width: 50%;">
    </footer>
	</form>
  </div>
</div>
@endsection