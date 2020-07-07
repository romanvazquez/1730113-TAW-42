@extends('layout')

@section('title', $data['titulo'])
    
    @section('content')

                <main>
                    <div class="container-fluid">
                        <h2 class="mt-4">{{ $data['titulo'] }}</h2>

                        <div class="card mt-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>{{ $data['titulo']}}
                            </div>

                            <div class="row mt-4 mb-2">
                                <div class="col-6">
                                    <div class="text-left ml-3">
                                        <a href="{{ url( $data['titulo'].'/registrar') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-plus-circle"></i> Registrar nueva {{ $data['entidad'] }}</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right mr-3">
                                        <i class="fa fa-fw fa-globe"></i><strong> Buscar {{ $data['entidad'] }}</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Fecha de agregada</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($categorias as $categoria)
                                            <tr>
                                                
                                                <td>{{ $categoria->name_category }}</td>
                                                <td>{{ $categoria->description_category }}</td>
                                                <td>{{ $categoria->created_at }}</td>

                                                <td class="actions">
                                                    <a href="{{ url( $data['titulo'].'/'.$categoria->id.'/editar') }}" class="edit">
                                                        <div class="text-center"><i class="fas fa-pen"></i> Editar</div>
                                                    </a>
                                                    
                                                    <form action="{{ url( $data['titulo'].'/'.$categoria->id.'/eliminar') }}" method="POST">
                                                        @csrf
                                                        <input type="submit" value="Eliminar" class="trash">
                                                    </form>
                                                </td>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
    @endsection