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
*
* Vistas Empleados
*
*/
Route::get('/empleados', 'EmpleadoController@mostrar')->name('empleados');

// Enviar rutas al controlador junto con la invocación de su método respectivo 
Route::get('/empleados/mostrar', 'EmpleadoController@mostrar');

Route::get('/empleados/registrar','EmpleadoController@registrar');


// Ruta parametrizada para editar
Route::get('/empleados/{id}/editar', 'EmpleadoController@editar');

// Rutas para los formularios REGISTRAR y EDITAR
Route::post('/empleados/registrar', 'EmpleadoController@registrar')->name('registrar-empleado');

Route::post('/empleados/{id}/editar', 'EmpleadoController@editar')->name('editar-empleado');

Route::post('/empleados/{id}/eliminar', 'EmpleadoController@eliminar')->name('eliminar-empleado');

/*
*
* Vistas Departamentos
*
*/
Route::get('/departamentos', 'DepartamentoController@mostrar')->name('departamentos');

// Enviar rutas al controlador junto con la invocación de su método respectivo 
Route::get('/departamentos/mostrar', 'DepartamentoController@mostrar');

Route::get('/departamentos/registrar','DepartamentoController@registrar');


// Ruta parametrizada para editar
Route::get('/departamentos/{id}/editar', 'DepartamentoController@editar');

// Rutas para los formularios REGISTRAR y EDITAR
Route::post('/departamentos/registrar', 'DepartamentoController@registrar')->name('registrar-departamento');

Route::post('/departamentos/{id}/editar', 'DepartamentoController@editar')->name('editar-departamento');

Route::post('/departamentos/{id}/eliminar', 'DepartamentoController@eliminar')->name('eliminar-departamento');


/*
*
* Redirigir hacia la vista correcta, los errores más comunes al acceder a la vista, a través de la URL
*
*/
Route::get('/Empleados', function(){ return redirect()->route('empleados'); });
Route::get('/Empleado', function(){ return redirect()->route('empleados'); });
Route::get('/empleado', function(){ return redirect()->route('empleados'); });