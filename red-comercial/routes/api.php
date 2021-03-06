<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para el Dropdown dinámico del formulario para Registrar empresas
Route::get('getEstados', 'APIController@getEstados');
Route::get('getMunicipios', 'APIController@getMunicipios');
Route::get('getTiposCalle', 'APIController@getTiposCalle');

// Obtener coordenadas de todos las empresas registradas
Route::get('getCoordenadas', 'APIController@getCoordenadas');