<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;

class RegisterController extends Controller{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){

        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:30'],
            'nombres' => ['required', 'string', 'max:30'],
            'apellidos' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:72', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sexo' => ['required', Rule::in(['H','M'])],
            'fecha_nacimiento' => ['required', 'date'],
            'telefono' => ['required', 'string', 'max:10'],
        ]);
    }
    
    protected function create(array $data){
        // print_r($data);
        return User::create([
            'usuario' => $data['usuario'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sexo' => $data['sexo'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'telefono' => $data['telefono']
        ]);
    }
}
