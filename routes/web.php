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
	Route::get('/turnonuevo','TurnoController@turnonuevo')->name('turno.nuevo'); 						//crear un turno nuevo
	Route::get('/turno/editaforadores/{id}/edit','TurnoController@editaforadores'); //Editar aforadores
	Route::post('/turnonuevo','TurnoController@crearturno')->name('turno.nuevo');						//Crear un turno nuevo
	Route::post('/aforadores', 'TurnoController@storeaforadores'); 					//Registrar los aforadores
	Route::get('/turno/edit/{id}', 'TurnoController@editarturno');					//Editar Turno
	Route::get('/turno/cerrarturno/{id}', 'TurnoController@cerrarturno');			//Llamada al form para Cerrar Turno
	Route::post('/turno/cerrarturno', 'TurnoController@confirmarcierreturno');		//Confirmar cierre de turno
    Route::get('/turno/cierres/pdf/{id}', 'TurnoController@cierreAforadoresPDF');   //Generar pdf
    Route::get('/turno/cierres/imprimir/{id}', 'TurnoController@imprimircierre');   //Generar pdf

});

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	//Productos
	Route::get('/products','ProductController@index')->name('admin.products');				            //LIsta de Productos
	Route::get('/products/create','ProductController@create')->name('admin.product.create');	        //LIsta de Productos
	Route::post('/products','ProductController@store')->name('admin.product.store');			        //Registrar alta del Producto
	Route::put('/products/{id}', 'ProductController@update');		                                    //Actualizar datos del producto
	Route::get('/products/{id}/edit','ProductController@edit'); 	                                    //Editar productos
    Route::delete('/products/{id}/delete', 'productController@delete')->name('admin.product.delete');   //vproducto para eliminar

	//Surtidores
	Route::get('/surtidors','SurtidorController@index')->name('admin.surtidors');           			    //LIsta de Surtidores
    Route::get('/surtidors/create', 'SurtidorController@create')->name('admin.surtidors.create');           //vista creacion de surtidor
    Route::post('/surtidors', 'SurtidorController@store')->name('admin.surtidors.store');              //Registrar surtidor en la BD
	Route::get('/surtidors/{id}/edit', "SurtidorController@edit")->name('admin.surtidors.edit');    	    //Edita Surtidor
	Route::put('/surtidors/update/{id}', "SurtidorController@update")->name('admin.surtidors.update');	    //Update Surtidor
    Route::delete('/surtidors/{id}/delete', "SurtidorController@delete")->name('admin.surtidors.delete');   //Delete surtidor

	//Route::get('/turnonuevo','TurnoController@turnonuevo'); 						//crear un turno nuevo

	//Route::post('/turnonuevo','TurnoController@crearturno');						//Crear un turno nuevo
	//Route::post('/aforadores', 'TurnoController@storeaforadores'); 					//Registrar los aforadores
	Route::get('/turno/edit/{id}', 'TurnoController@editarturno');					//Editar Turno
	//Route::get('/turno/cerrarturno/{id}', 'TurnoController@cerrarturno');			//Llamada al form para Cerrar Turno
	//Route::post('/turno/cerrarturno', 'TurnoController@confirmarcierreturno');		//Confirmar cierre de turno
    Route::resource('/user', 'UserController');

    Route::get('/page-expired', function () {
        return view('exceptions/errors419');
    })->name('custom-419-page');
});
