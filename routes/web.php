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
Route::get('/pacos/{namepacos}', 'PerfilpacosController@show')->middleware('auth');

//Route::get('/prueba/{idpacos}', 'PerfilpacosController@index')->middleware('auth');

Route::get('/prueba', function () {
    return view('pacos.prueba');
});


//administrar mi pacos
Route::get('/manage/nuevo/pacos', 'NuevoPacosController@index')->middleware('auth');
Route::get('/manage/mipacos/{namepacos}', 'ManagePacosController@index')->middleware('auth');
Route::get('/manage/pacos/menu/{namepacos}' , 'ComidaController@index')->middleware('auth');
//Route::resource('registrarPACOS', 'RestaurantesController');
Route::resource('manage/registrarPACOS', 'NuevoPacosController');
Route::resource('manage/agregar/detallesPACOS', 'ManagePacosController')->middleware('auth');
Route::get('manage/registrar/comida', 'ComidaController@show');

