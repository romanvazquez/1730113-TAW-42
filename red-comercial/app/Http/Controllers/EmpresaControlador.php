<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use DB;

class EmpresaControlador extends Controller{
    
    public function mostrar(){

    }

    public function registrar(Request $request){

        $empresa = new Empresa;
            
        $empresa->nombre = $request->input('nombre');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->telefono = $request->input('telefono');
        $empresa->giro_comercio = $request->input('giro_comercio');
        $empresa->palabras_clave = $request->input('palabras_clave');
        $empresa->logotipo = $request->logotipo->getClientOriginalName();

        if($request->hasFile('logotipo')){ // Si se carga una imagen, almacenarla en el directorio señalado
            
            $filename = $request->logotipo->getClientOriginalName();
            $request->logotipo->storeAs('empresas',$filename,'public');
        }

        $empresa->save();
        
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            

            //Insertar los campos del formulario en la tabla de la base de datos
            
            
            // // Mensaje de alerta
            // // Alert::success('Datos guardados con éxito.');
            // return redirect('empresas');
            return "Empresa registrada";

        // } else { // SI el REQUEST NO es a través de POST
        
        //     $empresa = [
        //     ];

        //     // Se envía hacia la vista de registro
        //     return view('Empresas/registrar', compact('empresa', 'data'));
        // }
    }
}
