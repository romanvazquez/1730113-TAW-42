@extends('layout')

@section('title', $data['titulo'])
    
    @section('content')

                <main>
                    <div class="container col-sm-12 col-md-10 col-lg-10 col-xl-7 mt-4">
                        
                        <h2 class="mt-4">{{ $data['titulo'] }}</h2>
                        <div class="card mt-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-7">
                                        <legend>Registrar</legend>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5">
                                        <div class="text-right">
                                            <a href="{{ route('categorias') }}"><label>Regresar a lista de {{ $data['entidad'] }}</label></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                                <form action="{{ route('registrar-categoria') }}" method="POST" data-parsley-validate>
                                    @csrf
                                    <div class="form-row mt-2">
                                        <div class="container">
                                            <label for="name_category">Nombre de la categoría</label><label class="text-danger">*</label>
                                            <input type="text" class="form-control" name="name_category" id="name_category" placeholder="Ingrese el nombre de la categoría" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>

                                    <div class="form-row mt-4 mb-4">
                                        <div class="container">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="description">
                                                    <label class="form-check-label" for="description">Escribir una descripción.</label>
                                            </div>
                                            <textarea class="form-control mt-2" name="description_category" id="description_category" rows="2" maxlength="70"></textarea> <!-- Agregar disabled -->
                                            <span id="maxCharacters"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-right">
                                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
    @endsection