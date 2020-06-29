<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use DB;

class EmpleadoController extends Controller
{
    public function mostrar(){
        // Obtener todos los empleados de la tabla en la base de datos
        $empleados = Empleado::all();

        // Mostrar vista de la consulta de empleados
        return view('Empleados/mostrar', compact('empleados'));
    }

    public function registrar(Request $request){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            $empleado = $request->except('_token');

            //Insertar en la tabla empleado los datos 
            $id = DB::Table('empleados')->insertGetId($empleado);
            // Alert::success('Datos guardados con éxito.');

            return redirect('empleados');

        } else {
            
            // SI el REQUEST no es a través de POST se inicializan los datos en blanco
            $empleado = [
                'nombres' => '',
                'apellidos' => '',
                'cedula' => '',
                'email' => '',
                'lugar_nacimiento' => '',
                'sexo' => '',
                'estado_civil' => '',
                'telefono' => ''
            ];

            return view('Empleados/registrar', compact('empleado'));
        }
    }

    // Controlador para editar empleados
    public function editar($id, Request $request){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
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
            
            return redirect('empleados');
        }
        else {
            $empleado = Empleado::findOrFail($id);

            return view('Empleados/editar', compact('empleado'));
        }
    }

    // Controlador para eliminar 
    public function eliminar($id){
        $empleado = Empleado::findOrFail($id);

        $empleado->delete();
        // Alert::success('Dato eliminado');
        return redirect('empleados');
    }
}
