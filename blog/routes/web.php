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

Route::view('/','welcome')->name('home');
Route::view('/about','about')->name('about');
Route::view('/contact','contact')->name('contact');

/* 
* Métodos de obtener, guardar y eliminar datos
* GET, POST, PUT, DELETE
*/

/*
*
* Vistas Empleados
*
*/
Route::get('/empleados', 'EmpleadoController@mostrar')->name('empleados');

// Enviar rutas al controlador junto con la invocación de su método respectivo 
Route::get('/empleados/mostrar', 'EmpleadoController@mostrar');

Route::get('/empleados/registrar','EmpleadoController@registrar');

// Ruta parametrizada
Route::get('/empleados/{id}/editar', 'EmpleadoController@editar');

// Rutas para los formularios REGISTRAR y EDITAR
Route::post('/empleados/registrar', 'EmpleadoController@registrar')->name('registrar-empleado');

Route::post('/empleados/{id}/editar', 'EmpleadoController@editar')->name('editar-empleado');

Route::post('/empleados/{id}/eliminar', 'EmpleadoController@eliminar')->name('eliminar-empleado');

/*
*
* Redirigir hacia la vista correcta, los errores más comunes al acceder a la vista, a través de la URL
*
*/
Route::get('/Empleados', function(){ return redirect()->route('empleados'); });
Route::get('/Empleado', function(){ return redirect()->route('empleados'); });
Route::get('/empleado', function(){ return redirect()->route('empleados'); });