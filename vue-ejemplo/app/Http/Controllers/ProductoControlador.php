<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use DB;

class ProductoControlador extends Controller{
    
    public function mostrar(){
        $data=['titulo'=>'Productos', 'entidad'=>'producto'];

        // Obtener los registros de la tabla en la base de datos
        $productos = DB::table('productos as p')->join('categorias as c', 'c.id','=','p.id_categoria')->select('p.id','p.code_product','p.name_product','p.price_product','p.stock','c.name_category')->get();
        
        // Mostrar vista de la consulta
        return view('Productos/mostrar', compact('productos','data'));
    }

    public function registrar(Request $request){
        $data=['titulo'=>'Productos', 'entidad'=>'producto'];

        // Obtener de una tabla externa al modelo del controlador, los datos que tendrá el elemento SELECT 
        $categorias = Categoria::all();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Registrar los datos del request
            $producto = $request->except('_token');

            //Insertar en la tabla empleado los datos 
            $id = DB::Table('productos')->insertGetId($producto);
            
            // Mensaje de alerta
            // Alert::success('Datos guardados con éxito.');
            return redirect('productos');

        } else {
            
            // SI el REQUEST NO es a través de POST se inicializan los datos en blanco
            $producto = [
            ];

            return view('Productos/registrar', compact('categorias','data','producto'));
        }
    }

    public function editar($id, Request $request){
        $data=['titulo'=>'Productos', 'entidad'=>'producto'];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $producto = Producto::findOrFail($id);

            $producto->code_product = $request->input('code_product');
            $producto->name_product = $request->input('name_product');
            $producto->price_product = $request->input('price_product');
            $producto->stock = $request->input('stock');
            $producto->id_categoria = $request->input('id_categoria');


            $producto->save();
            
            return redirect('productos');
        }
        else {
            // Obtener de una tabla externa al modelo del controlador, los datos que tendrá el elemento SELECT 
            $categorias = Categoria::all();
            
            // Obtener el registro de la tabla en la base de datos
            $producto = Producto::findOrFail($id);

            return view('Productos/editar', compact('categorias','data','producto'));
        }
    }

    public function eliminar($id){
        $producto = Producto::findOrFail($id);

        $producto->delete();
        
        // Mensaje de alerta
        // Alert::success('Dato eliminado');
        return redirect('productos');
    }
}
