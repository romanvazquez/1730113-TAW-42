<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    use Notifiable;

    protected $fillable = [
        'nombres','apellidos','email','password','sexo', 'fecha_nacimiento','telefono'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        /* 
        * RELACIÓN ENTRE USERS y FOLES.
        * El tipo de relación en este caso es 'Many-to-Many' puesto que VARIOS USUARIOS PUEDEN TENER UNO O MÁS ROLES.
        */
        return $this->belongsToMany('App\Role')->withTimestamps(); // Crear la relacion de la tabla de intersección
    }

    // Autoriza una acción, con base en verificar si tiene algún rol
    public function authorizeRoles($roles){
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    
    // Método que valida si tiene por lo menos algún Rol
    public function hasAnyRole($roles){
        if (is_array($roles)) {
            
            foreach ($roles as $role) {
                
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }

        return false;
    }
    
    // Verifica si tiene un tipo de rol específico (envíado como parámetro)
    public function hasRole($role){

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
