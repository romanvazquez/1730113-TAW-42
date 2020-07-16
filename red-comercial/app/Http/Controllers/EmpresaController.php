<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller{

    public function index(Request $request){
        
        if($request->ajax()){
            return Empresa::where('user_id', auth()->id())->get();
        }else{
            return view('Empresas/registrar');
        }
    }

    public function create(){

        $empresa = new Empresa;
            
        $empresa->nombre = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->telefono = $request->telefono;
        $empresa->giro_comercio = $request->giro_comercio;
        $empresa->palabras_clave = $request->palabras_clave;
        // $empresa->logotipo = $request->logotipo->getClientOriginalName();

        // if($request->hasFile('logotipo')){ // Si se carga una imagen, almacenarla en el directorio señalado
            
        //     $filename = $request->logotipo->getClientOriginalName();
        //     $request->logotipo->storeAs('empresas',$filename,'public');
        // }

        $empresa->save();
        
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
