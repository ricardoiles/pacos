<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 170);
            $table->string('direccion', 170);
            $table->bigInteger('telefono');
            $table->string('barrio', 70);
            $table->bigInteger('ciudad');
            $table->string('pais');
            $table->bigInteger('nit');
            $table->binary('digVerf');
            $table->boolean('domicilios');
            $table->boolean('reservas');
            $table->boolean('ordenes');
            $table->bigInteger('fotoPerfil');
            $table->bigInteger('fotoPortada');
            $table->bigInteger('promo');
            $table->bigInteger('capacidad');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
