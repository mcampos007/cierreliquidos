<?php

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

Route::get('/', 'WelcomeController@index');
Route::get('/precios',"WelcomeController@precios");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'user'])->prefix('user')->namespace('User')->group(function () {
	Route::get('/turnonuevo','TurnoController@turnonuevo'); 						//crear un turno nuevo
	Route::get('/turno/editaforadores/{id}/edit','TurnoController@editaforadores'); //Editar aforadores
	Route::post('/turnonuevo','TurnoController@crearturno');						//Crear un turno nuevo
	Route::post('/aforadores', 'TurnoController@storeaforadores'); 					//Registrar los aforadores
	Route::get('/turno/edit/{id}', 'TurnoController@editarturno');					//Editar Turno
	Route::get('/turno/cerrarturno/{id}', 'TurnoController@cerrarturno');			//Llamada al form para Cerrar Turno
	Route::post('/turno/cerrarturno', 'TurnoController@confirmarcierreturno');		//Confirmar cierre de turno
});

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products','ProductController@index');			//LIsta de Productos
	Route::put('/products/{id}', 'ProductController@update');	//Actualizar datos del producto
	Route::get('/products/{id}/edit','ProductController@edit'); 					//Editar aforadores

	//Route::get('/turnonuevo','TurnoController@turnonuevo'); 						//crear un turno nuevo
	
	//Route::post('/turnonuevo','TurnoController@crearturno');						//Crear un turno nuevo
	//Route::post('/aforadores', 'TurnoController@storeaforadores'); 					//Registrar los aforadores
	//Route::get('/turno/edit/{id}', 'TurnoController@editarturno');					//Editar Turno
	//Route::get('/turno/cerrarturno/{id}', 'TurnoController@cerrarturno');			//Llamada al form para Cerrar Turno
	//Route::post('/turno/cerrarturno', 'TurnoController@confirmarcierreturno');		//Confirmar cierre de turno
});