<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    public function users(){

        /* 
        * RELACIÓN ENTRE FOLES y USERS.
        * El tipo de relación en este caso es Many-to-Many puesto que VARIOS USUARIOS PUEDEN TENER UNO O MÁS ROLES.
        */

        return $this->belongsToMany('App\User')->withTimestamps();
    }
}