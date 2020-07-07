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

Route::view('/dashboard','dashboard')->name('dashboard');

/*
*
* Vistas
*
*/

// Productos
Route::get('/Productos', 'ProductoControlador@mostrar')->name('productos');
Route::get('/Productos/registrar','ProductoControlador@registrar');
Route::get('/Productos/{id}/editar', 'ProductoControlador@editar');

// Operaciones CRUD
Route::post('/Productos/registrar', 'ProductoControlador@registrar')->name('registrar-producto');
Route::post('/Productos/{id}/editar', 'ProductoControlador@editar')->name('editar-producto');
Route::post('/Productos/{id}/eliminar', 'ProductoControlador@eliminar')->name('eliminar-producto');

Route::get('/producto', function(){ return redirect()->route('productos'); });
Route::get('/productos', function(){ return redirect()->route('productos'); });
Route::get('/Producto', function(){ return redirect()->route('productos'); });


// Categorias
Route::get('/Categorias', 'CategoriaControlador@mostrar')->name('categorias');
Route::get('/Categorias/registrar','CategoriaControlador@registrar');
Route::get('/Categorias/{id}/editar', 'CategoriaControlador@editar');

// Operaciones CRUD
Route::post('/Categorias/registrar', 'CategoriaControlador@registrar')->name('registrar-categoria');
Route::post('/Categorias/{id}/editar', 'CategoriaControlador@editar')->name('editar-categoria');
Route::post('/Categorias/{id}/eliminar', 'CategoriaControlador@eliminar')->name('eliminar-categoria');

Route::get('/categoria', function(){ return redirect()->route('categorias'); });
Route::get('/categorias', function(){ return redirect()->route('categorias'); });
Route::get('/Categoria', function(){ return redirect()->route('categorias'); });

