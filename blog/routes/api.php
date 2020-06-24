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

Route::get('empleados/{id}', function($id){
    $empleado = Empleado::find($id);
    return $empleado;
});

// Ruta para recibir datos y guardar nuevos empleados 
Route::post('empleados', function(Request $request){

    // Validar datos del empleado:
    $request->validate([
        'nombres'=> 'required|max:30',
        'apellidos'=> 'required|max:30',
        'cedula'=> 'required|max:30',
        'email'=> 'required||email|unique:empleados|max:50',
        'lugar_nacimiento'=> 'required|max:30',
        'sexo'=> 'required|max:15',
        'estado_civil'=> 'required|max:15',
        'telefono'=> 'required|max:10'
    ]);
    
    // Llenar los parámetros utilizando la petición
    $empleado = new Empleado;
    $empleado->nombres = $request->input('nombres');
    $empleado->apellidos = $request->input('apellidos');
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->sexo = $request->input('sexo');
    $empleado->estado_civil = $request->input('estado_civil');
    $empleado->telefono = $request->input('telefono');

    $empleado->save();
    
    return 'Empleado creado';
});

// Ruta para actualizar empleado
Route::put('empleados/{id}', function(Request $request, $id){
    
    $request->validate([
        'nombres'=> 'required|max:30',
        'apellidos'=> 'required|max:30',
        'cedula'=> 'required|max:30',
        'email'=> 'required|max:50|email|unique:empleados,email'.$id,
        'lugar_nacimiento'=> 'required|max:30',
        'sexo'=> 'required|max:15',
        'estado_civil'=> 'required|max:15',
        'telefono'=> 'required|max:10'
    ]);

    $empleado = Empleado::findOrFail($id);

    $empleado->nombres = $request->input('nombres');
    $empleado->apellidos = $request->input('apellidos');
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->sexo = $request->input('sexo');
    $empleado->estado_civil = $request->input('estado_civil');
    $empleado->telefono = $request->input('telefono');

    $empleado->save();

    return "Empleado actualizado";
});

// Ruta para eliminar empleados
Route::delete('empleados/{id}',function($id){
    
    $empleado = Empleado::findOrFail($id);
    $empleado->delete();
    return "Empleado eliminado";
});