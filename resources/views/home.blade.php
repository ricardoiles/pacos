@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-7">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>

                    <div class="card-content">
                       ir al pacos
                       <?php $idpacos='Hela2delaesquina'; ?>
                       <a href="{{ action('PerfilpacosController@show', ['idpacos' => $idpacos]) }}">Hela2 de la esquina</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
