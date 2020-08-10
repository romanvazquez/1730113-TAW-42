<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\Registered;
use Hash;
use Auth;
use App\Objects\AdminUser;
use App\User;
use App\Role;

class AdminUserController extends AdminController{
    
    public function initListing(){
        
        $this->initProcessFilter();

        $admin_user = AdminUser::select('id', 'nombres', 'email')->orderBy('id', 'desc');

        if ($this->filter) {
            $admin_user->where($this->filter_search);
        }

        $this->obj = $admin_user->paginate($this->paginate);

        $keys = [
              'id' => [
                  'text' => 'ID',
                  'filter' => true
              ],
              'nombres' => [
                  'text' => 'Nombre',
                  'filter' => true
              ],
              'email' => [
                  'text' => 'Email',
                  'filter' => true
              ]
        ];

        return array(
            'obj' => $this->obj,
            'keys' => $keys
        );
    }

    public function initContentRegister($id = null){
        
        $this->obj = new AdminUser;

        if ($id) {
          $this->obj = AdminUser::find($id);
        }

        return array(
            'employee' => $this->obj
        );
    }

    public function initProcessRegister(Request $request, $id = null){
        
        $data = $request->all();

        // Validaciones en el Backend
        if ($data['password'] != $data['password_confirmation']) {
            return json('error', 'La contraseñas no coinciden.');
        }

        if (isset($data['password']) && $data['password'] && strlen($data['password']) < 6) {
            return json('error', 'La contraseña es muy corta.');
        }

        $getUser = User::where('email', $data['email'])->first();

        if ($getUser) {
          $user = $getUser;
        }

        if ($getUser && !$id) {
            return json('error', 'Ya existe un usuario con esa dirección de correo electrónico.');
        }

        // Guardar los datos en el modelo
        $user = User::create([
          'nombres' => $data['nombres'],
          'apellidos' => $data['apellidos'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'sexo' => $data['sexo'],
          'fecha_nacimiento' => $data['fecha_nacimiento'],
          'telefono' => $data['telefono'],
        ]);

        // // Almacenar el Id de Usuario y de Rol en la tabla de intersección, que modela la relación M:M entre Usuarios y Roles
        $user->roles()->attach(Role::where('nombre', $data['tipo'])->first());

        return json('success', t('La cuenta de usuario ha sido creada.'));
    }

    public function guard()
    {
        return Auth::guard('admin_user');
    }

    public function initProcessDelete($id = null){
        $obj = AdminUser::find($id);

        if ($obj) {
          $obj->delete();
        }

        return redirect(route('admin_user.list'));
    }

    public function initProcessLogin()
    {
        $login_success = Auth::guard('admin_user')->attempt([
          'email' => request()->input('email'),
          'password' => request()->input('password')
        ], request()->input('keep_active'));

        if ($login_success) {
          return array(
            'status' => 'success',
            'message' => 'Has iniciado sesión.'
          );
        }

        return array(
          'status' => 'error',
          'message' => 'Ha ocurrido un error. Por favor, inténtelo nuevamente.'
        );
    }

    public function initProcessLogout()
    {
        Auth::guard('admin_user')->logout();

        $admin_route = config('adlara.admin_route') . '/app/login';

        $url = url($admin_route);

        return redirect($url);
    }

    public function initProcessCheckLogin()
    {
        if (Auth::guard('admin_user')->check()) {
          return array(
            'status' => 'success'
          );
        }

        return response('Unauthenticated', 401);
    }
}
