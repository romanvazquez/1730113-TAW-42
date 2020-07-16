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

Route::get('/home', 'HomeController@index')->name('home'); // Vista protegida para el Dashboard

/*
*
* Header routes
*
*/ 
Route::view('/inicio','/welcome')->name('inicio');
Route::view('/afiliate','/headers/afiliate')->name('afiliate');
Route::view('/headers/about','about')->name('about');
Route::view('/headers/faq','faq')->name('faq');
Route::view('/headers/contacto','contacto')->name('contacto');

// Empresas
Route::resource('/empresas', 'EmpresaController')->middleware('auth');

// Route::get('/Empresa/registrar','EmpresaControlador@registrar');
Route::view('/Empresa/registrar-domicilio','/Empresas/registrar-domicilio');
    

// Operaciones CRUD
Route::post('/Empresa/registrar', 'EmpresaControlador@registrar')->name('registrar-empresa');