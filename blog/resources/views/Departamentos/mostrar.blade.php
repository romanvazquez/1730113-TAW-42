@extends('layout')

@section('title','Departamentos')

@section('content')

    <div class="container">
        <h2 class="mt-4">{{ $data['titulo'] }}</h2>

        <div class="row mt-4 mb-4">
            <div class="col-6">
                <div class="text-left">
                    <a href="{{ route('registrar-departamento') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-plus-circle"></i> Registrar nuevo {{ $data['entidad'] }}</a>
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
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($departamentos as $departamento)
                    <tr>
                        
                        <td>{{ $departamento->id }}</td>
                        <td>{{ $departamento->nombre }}</td>

                        <td class="actions">
                            <a href="{{ url('departamentos/'.$departamento->id.'/editar') }}" class="edit">
                                <div class="text-center"><i class="fas fa-pen"></i> Editar</div>
                            </a>
                            <form action="{{ url('departamentos/'.$departamento->id.'/eliminar') }}" method="POST">
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