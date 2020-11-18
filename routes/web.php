<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('pacos', 'PerfilpacosController')->middleware('auth');


//Route::get('/prueba/{idpacos}', 'PerfilpacosController@index')->middleware('auth');

Route::get('/registrarme', function () {
    return view('auth.registeruser');
});

//administrar mi pacos
Route::get('/manage/nuevo/pacos', 'NuevoPacosController@index')->middleware('auth');
Route::get('/manage/mipacos/{namepacos}', 'ManagePacosController@index')->middleware('auth');
// opciones dentro del pacos
Route::get('/manage/mipacos/{namepacos}/administrar', 'ManagePacosController@adminpacos')->middleware('auth');
//
Route::get('/manage/pacos/menu/{namepacos}' , 'MenuComidasController@index')->middleware('auth');
Route::get('/manage/{namepacos}/categorias', 'CategoryController@show')->middleware('auth');
Route::get('/manage/{namepacos}/categorias/nueva', 'CategoryController@agregar')->middleware('auth');
Route::get('/manage/{namepacos}/{category}/comida', 'ComidaController@show')->middleware('auth');
//administrar reservaciones
Route::get('/manage/mipacos/{namepacos}/{idpacos}/reservas', 'PacosReservacionesController@index')->middleware('auth');
// panel usuario
Route::get('/pacos/{namepacos}', 'PerfilpacosController@show')->middleware('auth');
Route::get('/pacos/{namepacos}/reservar', 'ReservacionesController@index')->middleware('auth');
Route::get('/pacos/{namepacos}/{reserva}/ordenarcomida', 'OrdenarComidaController@index')->middleware('auth');
//ver reseñas sitio
Route::get('/pacos/{namepacos}/reseñas', 'PerfilpacosController@showreseñas')->middleware('auth');
//admin user
Route::get('/user/{iduser}/manage', 'UserManageController@manage')->middleware('auth');

//apis
Route::get('/api/pacos/{namepacos}/{idcomida}', 'OrdenarComidaController@ordencomida')->middleware('auth');
Route::get('/api/pacos/{idcat}/comida', 'MenuComidasController@vercomidas')->middleware('auth');
//api cantidad de reservasxpacos
Route::get('/api/manage/pacos/{idpacos}/reservaciones', 'PacosReservacionesController@reservasPacos')->middleware('auth');

//epayco
//respuesta
Route::any('/{namepacos}/{idpacos}/epayco/respuesta', function ($namepacos, $idpacos) {
    return view('managepacos.epayco.respuesta')->with('namepacos', $namepacos)->with('idpacos', $idpacos);
});
//respuesta
Route::any('/epayco/confirmacion', function () {
    return view('managepacos.epayco.confirmacion');
});

//Route::resource('registrarPACOS', 'RestaurantesController');
Route::resource('manage/registrarPACOS', 'NuevoPacosController')->middleware('auth');
Route::resource('manage/agregar/detallesPACOS', 'ManagePacosController')->middleware('auth');
Route::resource('manage/categorias/registrarCategoria', 'CategoryController')->middleware('auth');
Route::resource('manage/categorias/comida/registrarComida', 'ComidaController')->middleware('auth');
Route::resource('busqueda/pacos/ciudad', 'HomeController')->middleware('auth');
//registrar reservacion
Route::resource('pacos/reservar/nueva', 'ReservacionesController')->middleware('auth');
//registrar orden de comida
Route::resource('pacos/reservar/registrarOrden', 'OrdenarComidaController')->middleware('auth');
//store users
Route::resource('user/manage/edit', 'UserManageController')->middleware('auth');
Route::resource('user/manage/edit', 'UserManageController')->middleware('auth');
