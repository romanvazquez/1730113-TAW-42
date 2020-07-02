@extends('layout')

@section('title', 'Editar departamento')

@section('content')

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="container col-sm-12 col-md-10 col-lg-10 col-xl-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('editar-departamento', [$departamento->id]) }}" method="POST" data-parsley-validate>
                            
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-7">
                                    <legend>Editar</legend>
                                </div>
                                <div class="col-12 col-sm-6 col-md-5">
                                    <div class="text-right">
                                        <a href="{{ route('departamentos') }}"><label>Regresar a lista de {{ $data['entidad'] }}</label></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="nombre">Nombre</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del departamento" autofocus value="{{ $departamento->nombre }}" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
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