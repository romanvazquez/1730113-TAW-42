<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AdminController;
use App\Objects\Empresa;
use App\Objects\Direccion;

class EmpresaController extends AdminController{

    public function initListing(){
        
        $this->initProcessFilter();
        
        $empresa = Empresa::select('id', 'nombre','telefono','url', 'giro_comercio','status')->where('id_user', \Auth::guard('admin_user')->user()->id )->orderBy('id', 'desc');

        if ($this->filter) {
            $empresa->where($this->filter_search);
        }

        $this->obj = $empresa->paginate($this->paginate);

        $keys = [
            'id' => [
                'text' => 'ID',
                'filter' => false
            ],
            'nombre' => [
                'text' => 'Nombre',
                'filter' => true
            ],
            'url' => [
                'text' => 'URL',
                'filter' => false
            ],
            'telefono' => [
                'text' => 'Teléfono',
                'filter' => true
            ],
            'giro_comercio' => [
                'text' => 'Giro del comercio',
                'filter' => true,
            ],
            'status' => [
                'text' => 'Estado',
                'filter' => false,
            ]
        ];

        return array(
            'obj' => $this->obj,
            'keys' => $keys
        );
    }

    public function initContentCreate($id = null){
    
        $actions = array(
          'heading' => 'Empresa',
          'slug' => '/empresas'
        );

        $this->obj = new Empresa;
        $this->obj2 = new Direccion;

        if ($id) {
          $this->obj = $this->obj->find($id);
          $this->obj2 = $this->obj2->firstWhere('id_empresa', $id);

          $actions = array(
            'heading' => 'Empresa : ' . $this->obj->nombre,
            'slug' => '/empresas'
          );
        }

        return array(
          'empresa' => $this->obj,
          'direccion' => $this->obj2,
          'actions' => $actions
        );
    }

    public function initProcessCreate($id = null){

        $this->obj1 = new Empresa;
        $this->obj2 = new Direccion;

        if ($id) {
            $this->obj1 = $this->obj1->find($id);
            // Recuperar el id de obj2 (de la dirección) que nos interesa
            $this->obj2 = $this->obj2->firstWhere('id_empresa', $id);
        }

        $empresa = $this->obj1;
        $direccion = $this->obj2;
        
        // Transacción
        try{
            /*
            * Asignar datos del request al modelo
            * Datos de la empresa
            */
            $empresa->nombre = request()->input('nombre');
            $empresa->descripcion = request()->input('descripcion');
            $empresa->telefono = request()->input('telefono');
            $empresa->giro_comercio = request()->input('giro_comercio');
            $empresa->palabras_clave = request()->input('palabras_clave');
            $empresa->logotipo = request()->input('logotipo');
            $empresa->status = 0;
            // $data1->url = \Str::slug(request()->input('url'));
            $empresa->url = null;
            $empresa->id_user = \Auth::guard('admin_user')->user()->id;

            /*
            * Asignar datos del request al modelo
            * Datos de la dirección
            */
            $direccion->id_estado = intval( request()->input('id_estado') );
            $direccion->id_municipio = intval( request()->input('id_municipio') );
            $direccion->id_tipo_calle = intval( request()->input('id_tipo_calle') );
            $direccion->calle = request()->input('calle');
            $direccion->codigo_postal = request()->input('codigo_postal');
            $direccion->colonia = request()->input('colonia');
            $direccion->num_exterior = request()->input('num_exterior');
            $direccion->num_interior = request()->input('num_interior');
            $direccion->latitud = floatval( request()->input('latitud') );
            $direccion->longitud = floatval( request()->input('longitud') );
    
            DB::beginTransaction();

            // Guardar los campos del formulario en la tabla de la base de datos
            $empresa->save();

            $direccion->id_empresa = $empresa->id;

            // Guardar los campos del formulario en la tabla de la base de datos
            $direccion->save();

            DB::commit();
        } catch(ModelNotFoundException $e){
            DB::rollBack();
            return json('error', t('Algo salió mal. Por favor inténtelo nuevamente.'));
        }

        // Cuando la Id es diferente de null, entonces retorna el estado 'redirect' y para un mensaje para agregar a la ruta
        if (!$id) { 
            return json('redirect', 'edit/' . $empresa->id);
        }

        // Retorna un estado de éxito y un mensaje de que se ha actualizado
        return json('success', t('La empresa ha sido actualizada'));
    }

    public function initProcessDelete(){
        $component = request()->input('component');
        $id = request()->input('id');
        
        if (!$id) {
            return true;
        }

        if (!$component) {
            return true;
        }

        $component = ucwords(\Str::camel($component));
        $class = '\App\\Objects\\' . $component; 

        $c = $class::find($id);
        $c->delete();

        return json('success', 'La empresa ha sido eliminada.');
    }

}