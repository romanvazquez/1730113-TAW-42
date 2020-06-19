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

use App\Empleado;

// Listar empleados
Route::get('empleados', function(){
    $empleados = Empleado::get();
    return $empleados;
});


// Ruta para guardar nuevos empleados y recibir data (fase 1)
Route::post('empleados', function(){
    
    // Verificar que los datos enviados se reciban bien
    // return $request->all();

    // Validar datos del empleado:
    $request->validate([
        'nombres'=> 'required|max:50',
        'apellidos'=> 'required|max:50',
        'cedula'=> 'required|max:20',
        'email'=> 'required||email|unique|max:50',
        'lugar_nacimiento'=> 'required|max:50',
        'estado_civil'=> 'required|max:50',
        'telefono'=> 'required|numeric'
    ]);
    
    // Llenar los parámetros utilizando la petición
    $empleado = new Empleado;
    $empleado->nombres = $request->input('nombres');
    $empleado->nombres = $request->input('apellidos');
    $empleado->nombres = $request->input('cedula');
    $empleado->nombres = $request->input('email');
    $empleado->nombres = $request->input('lugar_nacimiento');
    $empleado->nombres = $request->input('sexo');
    $empleado->nombres = $request->input('estado_civil');
    $empleado->nombres = $request->input('telefono');

    $empleado->save();
    
    return 'Usuario creado';
    // return "Guardando empleados";
});