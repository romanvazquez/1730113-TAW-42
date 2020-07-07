@extends('layout')

@section('title', $data['titulo'])
    
    @section('content')

                <main>
                    <div class="container col-sm-12 col-md-10 col-lg-10 col-xl-7 mt-5">
                        <h2 class="mt-4">{{ $data['titulo'] }}</h2>
                        <div class="card mt-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-7">
                                        <legend>Registrar</legend>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-5">
                                        <div class="text-right">
                                            <a href="{{ route('productos') }}"><label>Regresar a lista de {{ $data['entidad'] }}</label></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body">

                                <form action="{{ route('registrar-producto') }}" method="POST" data-parsley-validate>
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="code_product">Código de producto</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">#</span></div>
                                                <input type="text" class="form-control" name="code_product" id="code_product" autofocus data-parsley-pattern="^[a-zA-Z0-9_. ]+$" data-parsley-length="[2, 20]" data-parsley-trigger="keyup" data-parsley-errors-container="#help-compra" required>
                                            </div>
                                            <span id="help-compra"></span>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="name_product">Nombre</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="text" class="form-control" name="name_product" id="name_product" placeholder="Nombre del producto" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
                                        </div>

                                        <div class="form-group col-sm-5">
                                            <label for="id_categoria">Categoría</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <select  class="form-control" name="id_categoria" id="id_categoria" required>
                                                <option value="">Seleccione una categoría</option>
                                                
                                                @foreach($categorias as $categoria)

                                                <option value="{{ $categoria->id }}">{{ $categoria->name_category }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="price_product">Precio</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">MXN</span></div>
                                                <input type="number" class="form-control" name="price_product" id="price_product" data-parsley-length="[1, 9]" data-parsley-trigger="keyup" data-parsley-errors-container="#help-venta" required>
                                            </div>
                                            <span id="help-venta"></span>
                                        </div>
                                        
                                        <div class="form-group col-sm-4">
                                            <label for="stock">Cantidad</label><!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Stock</span></div>
                                                <input type="number" class="form-control" name="stock" id="stock" data-parsley-length="[1, 4]" data-parsley-trigger="keyup" data-parsley-errors-container="#help-compra" required>
                                            </div>
                                            <span id="help-compra"></span>
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