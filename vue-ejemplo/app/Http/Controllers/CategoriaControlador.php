<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use DB;

class CategoriaControlador extends Controller{
    
    public function mostrar(){
        $data=['titulo'=>'Categorias', 'entidad'=>'categoria'];

        // Obtener los registros de la tabla en la base de datos
        $categorias = Categoria::all();
        
        // Mostrar vista de la consulta
        return view('Categorias/mostrar', compact('categorias','data'));
    }

    public function registrar(Request $request){
        $data = ['titulo' => 'Categorias', 'entidad' => 'categorias'];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            $categoria = $request->except('_token');

            //Insertar los campos del formulario en la tabla de la base de datos
            $id = DB::Table('categorias')->insertGetId($categoria);
            
            // Mensaje de alerta
            // Alert::success('Datos guardados con éxito.');
            return redirect('categorias');

        } else {
            
            // SI el REQUEST NO es a través de POST se inicializan los datos en blanco
            $categoria = [
            ];

            return view('Categorias/registrar', compact('categoria', 'data'));
        }
    }

    public function editar($id, Request $request){

        $data = ['titulo' => 'Categorias','entidad' => 'categorias'];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $categoria = Categoria::findOrFail($id);

            $categoria->name_category = $request->input('name_category');
            $categoria->description_category = $request->input('description_category');

            $categoria->save();
            
            return redirect('categorias');
        }
        else {
            $categoria = Categoria::findOrFail($id);

            return view('Categorias/editar', compact('categoria','data'));
        }
    }

    public function eliminar($id){
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();
        
        // Mensaje de alerta
        // Alert::success('Dato eliminado');
        return redirect('categorias');
    }
}
