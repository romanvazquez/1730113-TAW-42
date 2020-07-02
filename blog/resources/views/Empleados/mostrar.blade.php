@extends('layout')

@section('title','Empleados')

@section('content')

    <div class="container-fluid">
        <h2 class="mt-4">{{ $data['titulo'] }}</h2>

        <div class="row mt-4 mb-4">
            <div class="col-6">
                <div class="text-left">
                    <a href="{{ route('registrar-empleado') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-plus-circle"></i> Registrar nuevo {{ $data['entidad'] }}</a>
                </div>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <i class="fa fa-fw fa-globe"></i><strong> Buscar {{ $data['entidad'] }}</strong>
                </div>
            </div>
        </div>

        <div class="table table-bordered table-striped table-hover display nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre(s)</th>
                        <th scope="col">Apellido(s)</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Lugar de nacimiento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Estado civil</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Departamento</th>
                        
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($empleados as $empleado)
                    <tr>
                        
                        <td>{{ $empleado->nombres }}</td>
                        <td>{{ $empleado->apellidos }}</td>
                        <td>{{ $empleado->cedula }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->lugar_nacimiento }}</td>
                        <td>{{ $empleado->sexo }}</td>
                        <td>{{ $empleado->estado_civil }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->departamento }}</td>

                        <td class="actions">
                            <a href="{{ url('empleados/'.$empleado->id.'/editar') }}" class="edit">
                                <div class="text-center"><i class="fas fa-pen"></i> Editar</div>
                            </a>
                            
                            <form action="{{ url('empleados/'.$empleado->id.'/eliminar') }}" method="POST">
                                @csrf
                                <input type="submit" value="Eliminar" class="trash">
                            </form>
                        </td>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection