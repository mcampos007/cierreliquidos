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
Route::get('/precios',"WelcomeController@precios")->name('precios');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'user'])->prefix('user')->namespace('User')->group(function () {
	Route::get('/turnonuevo','TurnoController@turnonuevo')->name('turno.nuevo'); 						//crear un turno nuevo
	Route::get('/turno/editaforadores/{id}/edit','TurnoController@editaforadores')->name('editaaforadores'); //Editar aforadores
	Route::post('/turnonuevo','TurnoController@crearturno')->name('turno.nuevo');						//Crear un turno nuevo
	Route::post('/aforadores', 'TurnoController@storeaforadores')->name('aforadores'); 					//Registrar los aforadores
	Route::get('/turno/edit/{id}', 'TurnoController@editarturno')->name('showturno');					//Editar Turno
	Route::get('/turno/cerrarturno/{id}', 'TurnoController@cerrarturno')->name('showcierreturno');			//Llamada al form para Cerrar Turno
	Route::post('/turno/cerrarturno', 'TurnoController@confirmarcierreturno')->name('cerrarturno');		//Confirmar cierre de turno
    Route::get('/turno/cierres/pdf/{id}', 'TurnoController@cierreAforadoresPDF')->name('formcierretopdf');   //Generar pdf
    Route::get('/turno/cierres/imprimir/{id}', 'TurnoController@imprimircierre')->name('imprimircierre');   //Generar pdf

});

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	//Productos
	Route::get('/products','ProductController@index')->name('admin.products');				            //LIsta de Productos
	Route::get('/products/create','ProductController@create')->name('admin.product.create');	        //LIsta de Productos
	Route::post('/products','ProductController@store')->name('admin.product.store');			        //Registrar alta del Producto
	Route::put('/products/{id}', 'ProductController@update')->name('admin.products.update');            //Actualizar datos del producto
	Route::get('/products/{id}/edit','ProductController@edit')->name('admin.products.edit');           //Editar productos
    Route::delete('/products/{id}/delete', 'productController@delete')->name('admin.product.delete');   //vproducto para eliminar

	//Surtidores
	Route::get('/surtidors','SurtidorController@index')->name('admin.surtidors');           			    //LIsta de Surtidores
    Route::get('/surtidors/create', 'SurtidorController@create')->name('admin.surtidors.create');           //vista creacion de surtidor
    Route::post('/surtidors', 'SurtidorController@store')->name('admin.surtidors.store');              //Registrar surtidor en la BD
	Route::get('/surtidors/{id}/edit', "SurtidorController@edit")->name('admin.surtidors.edit');    	    //Edita Surtidor
	Route::put('/surtidors/update/{id}', "SurtidorController@update")->name('admin.surtidors.update');	    //Update Surtidor
    Route::delete('/surtidors/{id}/delete', "SurtidorController@delete")->name('admin.surtidors.delete');   //Delete surtidor
    Route::get('/surtidors/{id}/tanque/change', 'SurtidorController@changetanque')->name('admin.surtidors.changetanque');
    Route::put('/surtidors/{id}/tanque/change', 'SurtidorController@updatetanque')->name('admin.surtidors.updatetanque');

	//Route::get('/turnonuevo','TurnoController@turnonuevo'); 						//crear un turno nuevo

	//Route::post('/turnonuevo','TurnoController@crearturno');						//Crear un turno nuevo
	//Route::post('/aforadores', 'TurnoController@storeaforadores'); 					    //Registrar los aforadores
	Route::get('/turno/edit/{id}', 'TurnoController@editarturno')->name('editarturno');		//Editar Turno
    Route::put('/turno/edit/{id}', 'TurnoController@update')->name('updateturno');          //Update turno
	//Route::get('/turno/cerrarturno/{id}', 'TurnoController@cerrarturno');			//Llamada al form para Cerrar Turno
	//Route::post('/turno/cerrarturno', 'TurnoController@confirmarcierreturno');		//Confirmar cierre de turno
    Route::get('/turnoscheck', 'TurnoController@turnocheck')->name('admin.turnoscheck');   //Control de Cierres de Turnos
    Route::post('/verificaraforador', 'TurnoController@verificaraforador')->name('verificaraforador');   //Control de Cierres de Turnos
    Route::post('/actualizaraforador', 'TurnoController@actualizaraforador')->name('actualizaraforador');   //Control de Cierres de Turnos
    Route::resource('/user', 'UserController');

    //Tanques
    Route::resource('tanques', 'TanqueController');
    Route::get('/tanques/surtidors/{id}', 'TanqueController@surtidores')->name('tanques.surtidores');


    Route::get('/page-expired', function () {
        return view('exceptions/errors419');
    })->name('custom-419-page');
});
