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

/* 
* Métodos de obtener, guardar y eliminar datos
* GET, POST, PUT, DELETE
*/


Route::get('/productos', function(){
    return ('Listado de productos(get)');
});

Route::post('/productos', function(){
    return ('Almacenado de productos(post)');
});

Route::put('/productos/{id}', function($id){
    return ('Actualizando productos: '.$id);
});

// Parámetros
// Route::get('saludo/{nombre}/{apodo?}', function($nombre, $apodo){
    
//     $nombre = ucfirst($nombre);
//     // Validar si tiene un apodo
//     if($apodo){
//         return "Bienvenido {$nombre}, tu apodo es {$apodo}";
//     }

//     return "Bienvenido {$nombre}";
// });

Route::get('/empleados/mostrar', 'EmpleadoController@mostrar');