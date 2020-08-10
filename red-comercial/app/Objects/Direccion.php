<?php
namespace App\Objects;

use App\Objects\IDB;

class Direccion extends IDB{
    protected $table = 'direcciones';

    protected $fillable = [
        'id_estado','id_municipio','colonia','codigo_postal','id_tipo_calle', 'calle','num_exterior','num_interior','latitud','longitud','empresa_id'
    ];
}
