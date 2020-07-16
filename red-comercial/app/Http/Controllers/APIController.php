<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Municipio;
use App\TipoDeCalle;

class APIController extends Controller{

    public function getEstados(){

        // Obtener todos los datos del modelo
        $data = Estado::get();

        // Regresar la información en formato JSON
        return response()->json($data);
    }

    public function getMunicipios(Request $request){

        // Obtener los datos filtrados del modelo
        $data = Municipio::where('id_estado', $request->id_estado)->get();

        return response()->json($data);
    }

    public function getTiposCalle(){

        //Obtener los datos del modelo
        $data = TipoDeCalle::get();
        // Regresar la información en formato JSON
        return response()->json($data);
    }
}
