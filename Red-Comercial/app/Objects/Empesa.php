<?php
namespace App\Objects;

use App\Objects\IDB;

class Empresa extends IDB{
    protected $table = 'empresas';

    protected $fillable = [
        'nombre','descripcion','telefono','giro_comercio','palabras_clave', 'logotipo','status','url','id_user'
    ];
    
}
