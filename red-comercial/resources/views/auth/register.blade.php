@extends('layouts.layout')

@section('title', 'Regístrate')

@section('content')

    <main id="main">
        <section class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                        <div class="card-header">{{ __('Registro') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="name" class="col-form-label">{{ _('Nombre(s)') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="text" class="form-control" id="name" name="nombres" placeholder="Ingrese su nombre" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required autofocus>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="lastname" class="col-form-label">{{ _('Apellido(s)') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="text" class="form-control" name="apellidos" id="lastname" placeholder="Ingrese su(s) apellido(s)" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-md-4 col-sm-4">
                                            <label for="telefono" class="col-form-label">{{ _('Teléfono') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Ingrese número telefónico" data-parsley-type="number" data-parsley-length="[8, 10]" data-parsley-trigger="keyup" required>
                                        </div>
                                        
                                        <div class="form-group col-md-4 col-sm-5">
                                            <label for="fecha_nacimiento" class="col-form-label">{{ _('Fecha de Nacimiento') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" data-parsley-trigger="keyup" required>
                                        </div>
        
                                        <div class="form-group col-md-4 col-sm-3">
                                            <div class="text-left">
                                                <div class="container">
                                                    <label for="sexo" class="col-form-label">{{ _('Sexo') }}</label>
                                                    <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                    <div class="custom-control custom-radio space-bottom1">
                                                        <input type="radio" name="sexo" class="custom-control-input" id="Hombre" value="H" checked>
                                                        <label for="Hombre" class="custom-control-label">Hombre</label>
                                                    </div>
                                                    <div class="custom-control custom-radio space-bottom1">
                                                        <input type="radio" class="custom-control-input" name="sexo" id="Mujer" value="M">
                                                        <label for="Mujer" class="custom-control-label">Mujer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mt-3">
                                        <div class="form-group col-sm-6">
                                            <label for="usuario" class="col-form-label">{{ _('Nombre de usuario') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" data-parsley-pattern="^[a-zA-Z0-9_. ]+$" data-parsley-length="[4, 30]" data-parsley-errors-container="#help-block" data-parsley-trigger="keyup" required>
                                            </div>
                                            <span id="help-block"></span>
                                            <span id="usuario-disponible"></span>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="email" class="col-form-label">{{ __('E-Mail') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Ingrese su correo electrónico" data-parsley-type="email" data-parsley-length="[1, 40]" data-parsley-trigger="keyup" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-sm-6">
                                            <label for="password" class="col-form-label">{{ __('Contraseña') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
            
                                        <div class="form-group col-sm-6">
                                            <label for="password-confirm" class="col-form-label">{{ __('Confirmar contraseña') }}</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="text-right">
                                            <a href="{{ route('home') }}" class="btn btn-secondary float-left">Regresar</a>
                                            <button type="reset" class="btn btn-light">Limpiar</button>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
