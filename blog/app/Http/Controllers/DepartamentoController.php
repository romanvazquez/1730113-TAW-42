<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use DB;

class DepartamentoController extends Controller{
    
    public function mostrar(){
        // Obtener todos los departamentos de la tabla en la base de datos
        $departamentos = Departamento::all();

        $data = [
            'titulo' => 'Departamentos',
            'entidad' => 'departamento'
        ];

        // Mostrar vista de la consulta de departamentos
        return view('Departamentos/mostrar', compact('departamentos','data'));
    }

    public function registrar(Request $request){

        $data = [
            'titulo' => 'Departamentos',
            'entidad' => 'departamentos'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            $departamento = $request->except('_token');

            //Insertar en la tabla departamentos los datos 
            $id = DB::Table('departamentos')->insertGetId($departamento);
            
            // Mensaje de alerta
            // Alert::success('Datos guardados con éxito.');
            return redirect('departamentos');

        } else {
            
            // SI el REQUEST NO es a través de POST se inicializan los datos en blanco
            $departamento = [
                'nombre' => '',
            ];

            return view('Departamentos/registrar', compact('departamento', 'data'));
        }
    }

    public function editar($id, Request $request){

        $data = [
            'titulo' => 'Departamentos',
            'entidad' => 'departamentos'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $departamento = Departamento::findOrFail($id);

            $departamento->nombre = $request->input('nombre');

            $departamento->save();
            
            return redirect('departamentos');
        }
        else {
            $departamento = Departamento::findOrFail($id);

            return view('Departamentos/editar', compact('departamento', 'data'));
        }
    }

    // Controlador para eliminar 
    public function eliminar($id){
        $departamento = Departamento::findOrFail($id);

        $departamento->delete();
        // Alert::success('Dato eliminado');
        return redirect('departamentos');
    }
}
