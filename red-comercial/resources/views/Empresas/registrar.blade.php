@extends('layouts.layout')

@section('title', 'Registrar '.$data['entidad'])

    @section('content')
        <main id="main">
            <section class="contact">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Registro') }}</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('registrar-empresa') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="name" class="col-form-label">{{ _('Nombre de la empresa') }}</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <input type="text" class="form-control" id="name" name="nombre" placeholder="Ingrese el nombre de su empresa" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="form-group col-12">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Escribir una descripción.</label>
                                                </div>
                                                <textarea class="form-control mt-2" name="descripcion" id="descripcion" rows="3" maxlength="80"></textarea>
                                                <span id="maxCharacters"></span>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="form-group col-sm-8">
                                                <label for="telefono" class="col-form-label">{{ _('Teléfono') }}</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Ingrese número telefónico" data-parsley-type="number" data-parsley-length="[8, 10]" data-parsley-trigger="keyup" required>
                                            </div>
            
                                            <div class="form-group col-sm-4">
                                                <div class="text-left">
                                                    <div class="container">
                                                        <label for="giro_comercio" class="col-form-label">{{ _('Giro del comercio') }}</label>
                                                        <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                        <div class="custom-control custom-radio space-bottom1">
                                                            <input type="radio" name="giro_comercio" class="custom-control-input" id="Productos" value="0" checked>
                                                            <label for="Productos" class="custom-control-label">Productos</label>
                                                        </div>
                                                        <div class="custom-control custom-radio space-bottom1">
                                                            <input type="radio" class="custom-control-input" name="giro_comercio" id="Servicios" value="1">
                                                            <label for="Servicios" class="custom-control-label">Servicios</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="form-group col-sm-12">
                                                <label for="palabras_clave" class="col-form-label">{{ _('Palabras clave') }}</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <div class="alert alert-info" role="alert">
                                                    <strong>Palabras clave que definan tu negocio.</strong> Escribe hasta 25 palabras separadas por comas.
                                                </div>
                                                <input type="text" class="custom-control-input" name="palabras_clave" id="palabras_clave" data-role="tags-input" value="Ventas en línea, comercio">
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="form-group col-sm-12">
                                                <label for="logotipo" class="col-form-label">{{ _('Logitipo de la empresa') }}</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logotipo" name="logotipo">
                                                    <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="text-right">
                                                <a href="{{ route('home') }}" class="btn btn-secondary float-left">Regresar</a>
                                                <button type="reset" class="btn btn-light">Limpiar</button>
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
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
        
        @include('partials/footer')

    @endsection