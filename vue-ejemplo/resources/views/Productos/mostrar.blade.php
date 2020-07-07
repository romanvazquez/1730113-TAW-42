@extends('layout')

@section('title', $data['titulo'])
    
    @section('content')

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">{{ $data['titulo'] }}</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>{{ $data['titulo']}}
                            </div>

                            <div class="row mt-4 mb-2">
                                <div class="col-6">
                                    <div class="text-left ml-3">
                                        <a href="{{ url( $data['titulo'].'/registrar') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-plus-circle"></i> Registrar nuevo {{ $data['entidad'] }}</a>
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
                                                <th scope="col">Código</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Categoría</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($productos as $producto)
                                            <tr>
                                                
                                                <td>{{ $producto->code_product }}</td>
                                                <td>{{ $producto->name_product }}</td>
                                                <td>{{ $producto->name_category }}</td>
                                                <td>{{ $producto->price_product }}</td>
                                                <td>{{ $producto->stock }}</td>

                                                <td class="actions">
                                                    <a href="{{ url( $data['titulo'].'/'.$producto->id.'/editar') }}" class="edit">
                                                        <div class="text-center"><i class="fas fa-pen"></i> Editar</div>
                                                    </a>
                                                    
                                                    <form action="{{ url( $data['titulo'].'/'.$producto->id.'/eliminar') }}" method="POST">
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