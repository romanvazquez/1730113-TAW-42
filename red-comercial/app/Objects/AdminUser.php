<?php

namespace App\Objects;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class AdminUser extends Authenticatable{
    
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nombres','apellidos','email','password','sexo', 'fecha_nacimiento','telefono'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Objects\Post', 'id_author');
    }

    // Recupera un usuario
    public function getAdminUser($id = null){
        if ($id) {
            return $this->find($id);
        }

        if (Auth::guard('admin')->check()) {
          return Auth::guard('admin')->user();
        }

        return $this;
    }
}
