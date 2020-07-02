@extends('layout')

@section('title', 'Editar empleado')

@section('content')

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="container col-sm-12 col-md-10 col-lg-10 col-xl-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('editar-empleado', [$empleado->id]) }}" method="POST" data-parsley-validate>
                            
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-7">
                                    <legend>Editar</legend>
                                </div>
                                <div class="col-12 col-sm-6 col-md-5">
                                    <div class="text-right">
                                        <a href="{{ route('empleados') }}"><label>Regresar a lista de {{ $data['entidad'] }}</label></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="nombres">Nombre(s)</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre del empleado" autofocus value="{{ $empleado->nombres }}" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    <label for="apellidos">Apellido(s)</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellido(s) del empleado" value="{{ $empleado->apellidos }}" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="cedula">Cédula</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula de empleado" value="{{ $empleado->cedula }}" data-parsley-pattern="^[a-zA-Z0-9_. ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="form-group col-sm-4">
                                    <label for="email">Correo electrónico</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico" value="{{ $empleado->email }}" data-parsley-type="email" data-parsley-length="[1, 50]" data-parsley-trigger="keyup" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="lugar_nacimiento">Lugar de nacimiento</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="text" class="form-control" name="lugar_nacimiento" id="lugar_nacimiento" placeholder="Ingrese su lugar de nacimiento" value="{{ $empleado->lugar_nacimiento }}" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[1, 40]" data-parsley-trigger="keyup" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="telefono">Teléfono</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono del empleado" value="{{ $empleado->telefono }}" data-parsley-length="[1, 10]" data-parsley-trigger="keyup" required>
                                </div>
                            </div>

                            
                            <div class="form-row mt-3">
                                <div class="form-group col-md-4 col-sm-3">
                                    <label>Sexo</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" name="sexo" class="custom-control-input" value="masculino" {{ $empleado->sexo == "masculino" ? 'checked' : '' }} >
                                                <label class="custom-control-label">Masculino</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" name="sexo" class="custom-control-input"  value="femenino" {{ $empleado->sexo == "femenino" ? 'checked' : '' }} >
                                                <label class="custom-control-label">Femenino</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-3">
                                    <label>Estado civil</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" name="estado_civil" class="custom-control-input" value="soltero" {{ $empleado->estado_civil == "soltero" ? 'checked' : '' }} >
                                                <label class="custom-control-label">Soltero</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" name="estado_civil" class="custom-control-input"  value="casado" {{ $empleado->estado_civil == "casado" ? 'checked' : '' }} >
                                                <label class="custom-control-label">Casado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="id_departamento">Departamento</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <select  class="form-control" name="id_departamento" id="id_departamento" required>
                                        <option value="">Seleccione un departamento</option>

                                        @foreach($departamentos as $departamento)

                                        <option value="{{ $departamento->id }}" {{ $departamento->id == $empleado->id_departamento ? 'selected' : '' }} >{{ $departamento->nombre }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection