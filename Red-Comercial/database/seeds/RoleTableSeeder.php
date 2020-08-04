<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder{
    public function run(){
        /*
        * SUPER ADMIN
        */
        $role = new Role();
        $role->nombre = 'administrador';
        $role->save();

        /* 
        * EMPRESARIO
        * Tiene todos los privilegios dentro de el/los micrositio(s) que maneje
        * Puede agregar usuarios colaboradores
        */
        $role = new Role();
        $role->nombre = 'empresario';
        $role->save();

        /* 
        * COLABORADOR
        * Tiene privilegios limitados en la administración de un micrositio
        */
        $role = new Role();
        $role->nombre = 'colaborador';
        $role->save();

        /* 
        * USUARIO
        * No tiene privilegios en la administración de micrositios
        */
        $role = new Role();
        $role->nombre = 'usuario';
        $role->save();
    }
}
