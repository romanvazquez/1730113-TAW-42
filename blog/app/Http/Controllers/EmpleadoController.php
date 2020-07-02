<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Departamento;
use DB;

class EmpleadoController extends Controller{

    public function mostrar(){

        $data = [
            'titulo' => 'Empleados',
            'entidad' => 'empleado'
        ];

        // Obtener todos los empleados de la tabla en la base de datos

        $empleados = DB::table('empleados as e')->join('departamentos as d', 'd.id','=','e.id_departamento')->select('e.id','e.nombres','e.apellidos','e.cedula','e.email','e.lugar_nacimiento','e.sexo','e.estado_civil','e.telefono','d.nombre as departamento')->get();
        // Mostrar vista de la consulta de empleados
        return view('Empleados/mostrar', compact('empleados','data'));
    }

    public function registrar(Request $request){

        $data = [
            'titulo' => 'Empleados',
            'entidad' => 'empleados'
        ];

        // Obtener los departamentos
        $departamentos = Departamento::all();

        // Obtener todos los empleados de la tabla en la base de datos
        $empleados = Empleado::all();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            $empleado = $request->except('_token');

            //Insertar en la tabla empleado los datos 
            $id = DB::Table('empleados')->insertGetId($empleado);
            
            // Mensaje de alerta
            // Alert::success('Datos guardados con éxito.');
            return redirect('empleados');

        } else {
            
            // SI el REQUEST NO es a través de POST se inicializan los datos en blanco
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

            return view('Empleados/registrar', compact('empleado','data','departamentos'));
        }
    }

    // Controlador para editar empleados
    public function editar($id, Request $request){

        $data = [
            'titulo' => 'Empleados',
            'entidad' => 'empleados'
        ];

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

            $empleado->id_departamento = $request->input('id_departamento');

            $empleado->save();
            
            return redirect('empleados');
        }
        else {
            // Obtener los departamentos
            $departamentos = Departamento::all();

            $empleado = Empleado::findOrFail($id);

            return view('Empleados/editar', compact('empleado','data','departamentos'));
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
