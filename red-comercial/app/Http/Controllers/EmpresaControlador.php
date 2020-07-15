<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use DB;

class EmpresaControlador extends Controller{
    
    public function mostrar(){

    }

    public function registrar(Request $request){
        $data=['titulo' => 'Empresas', 'entidad' => 'empresa'];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            $empresa = [
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'telefono' => $request->input('telefono'),
                'giro_comercio' => $request->input('giro_comercio'),
                'palabras_clave' => $request->input('palabras_clave'),
                'logotipo' => $request->logotipo->getClientOriginalName()

            ];

            if($request->hasFile('logotipo')){ // Si se carga una imagen, almacenarla en el directorio señalado
                $request->logotipo->store('empresas');
            }
            

            //Insertar los campos del formulario en la tabla de la base de datos
            DB::Table('empresas')->insertGetId($empresa);
            
            // // Mensaje de alerta
            // // Alert::success('Datos guardados con éxito.');
            // return redirect('empresas');
            return "Empresa registrada";

        } else { // SI el REQUEST NO es a través de POST
        
            $empresa = [
            ];

            // Se envía hacia la vista de registro
            return view('Empresas/registrar', compact('empresa', 'data'));
        }
    }
}
