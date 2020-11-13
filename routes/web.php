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

Route::get('/registrarme', function () {
    return view('auth.registeruser');
});
//api para insertar orden de comida
Route::get('/api/registrarOrden/{id_Plato}/{precio}/{cant}/{Subtotal}/{Sub_desc}/{Sub_Iva}', 
		function ($id_Plato, $precio, $cant, $Subtotal, $Sub_desc, $Sub_Iva) {
	DB::table('detalle_reserv')->insert(['id_Plato' => $id_Plato, 'precio' => $precio, 'cant' => $cant, 'Subtotal' => $Subtotal, 'Sub_desc' => $Sub_desc, 'Sub_Iva' => $Sub_Iva]
			);
})->middleware('auth');


//administrar mi pacos
Route::get('/manage/nuevo/pacos', 'NuevoPacosController@index')->middleware('auth');
Route::get('/manage/mipacos/{namepacos}', 'ManagePacosController@index')->middleware('auth');
Route::get('/manage/pacos/menu/{namepacos}' , 'MenuComidasController@index')->middleware('auth');
Route::get('/manage/{namepacos}/categorias', 'CategoryController@show')->middleware('auth');
Route::get('/manage/{namepacos}/categorias/nueva', 'CategoryController@agregar')->middleware('auth');
Route::get('/manage/{namepacos}/{category}/comida', 'ComidaController@show')->middleware('auth');
Route::get('/pacos/{namepacos}/reservar', 'ReservacionesController@index')->middleware('auth');
Route::get('/pacos/{namepacos}/{reserva}/ordenarcomida', 'OrdenarComidaController@index')->middleware('auth');


Route::get('/api/pacos/{namepacos}/{idcomida}', 'OrdenarComidaController@ordencomida')->middleware('auth');
Route::get('/api/pacos/{idcat}', 'MenuComidasController@vercomidas')->middleware('auth');



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


Route::post('/api/pacos/reservar/registrarOrden', function () {
    return 'se reciben aqui';
});

