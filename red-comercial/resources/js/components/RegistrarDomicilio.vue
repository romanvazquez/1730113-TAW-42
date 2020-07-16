<template>
    <main id="main">
        <section class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Registro de domicilio</div>
                            <div class="card-body">
                                <div class="container">
                                    <legend>Empresa </legend>
                                    <input type="hidden" class="form-control" name="id_empresa" readonly>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="id_estado" class="col-form-label">Estado</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <select  class="form-control" name="id_estado" id="id_estado" v-model='estado' @change='getMunicipios()' required>
                                                <option value="">Seleccione un Estado</option> -->
                                                
                                                <option v-for='data in estados' :value='data.id'>{{ data.nombre }}</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="id_municipio" class="col-form-label">Municipio</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <select  class="form-control" name="id_municipio" id="id_municipio" v-model='municipio' required>
                                                <option value="">Seleccione un Municipio</option>
                                                
                                                <option v-for='data in municipios' :value='data.id'>{{ data.nombre }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-7">
                                            <label for="colonia" class="col-form-label">Colonia</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ingrese el nombre de la colonia" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[4, 60]" data-parsley-trigger="keyup" required autofocus>
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="codigo_postal" class="col-form-label">Código postal</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">C.P.</span></div>
                                                <input type="tel" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="Ej. 12345" data-parsley-type="number" data-parsley-length="[1, 6]" data-parsley-errors-container="#help-block" data-parsley-trigger="keyup" required>
                                            </div>
                                            <span id="help-block"></span>
                                            <span id="usuario-disponible"></span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-7">
                                            <label for="calle" class="col-form-label">Calle</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingrese el nombre de la calle" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[4, 40]" data-parsley-trigger="keyup" required autofocus>
                                        </div>

                                        <div class="form-group col-5">
                                            <label for="id_tipo_calle" class="col-form-label">Tipo de calle</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <select  class="form-control" name="id_tipo_calle" id="id_tipo_calle" v-model='tipo_de_calle' required>
                                                <option value="">Seleccione un tipo de calle</option> -->
                                                
                                                <option v-for='data in tipo_de_calles' :value='data.id'>{{ data.nombre }}</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="num_exterior" class="col-form-label">No. Exterior</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <input type="number" step="0.01" class="form-control" name="num_exterior" id="num_exterior" data-parsley-trigger="keyup" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="num_interior" class="col-form-label">No. Interior</label>
                                                <input type="number" step="0.01" class="form-control" name="num_interior" id="num_interior" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="latitud" class="col-form-label">Latitud</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <input type="number" step="0.01" class="form-control" name="latitud" id="latitud" data-parsley-trigger="keyup" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="longitud" class="col-form-label">Longitud</label>
                                                <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                <input type="number" step="0.01" class="form-control" name="longitud" id="longitud" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="text-right">
                                            <a href="" class="btn btn-secondary float-left">Regresar</a>
                                            <button type="reset" class="btn btn-light">Limpiar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h1>Mapa</h1>
                    </div>

                </div>
            </div>
        </section>
    </main>
</template>

<script>

export default {
    mounted(){
        console.log('Formulario Registrar Domicilio');
    },
    data(){
        return {
            estado: 0,
            estados: [],
            
            municipio: 0,
            municipios: [],

            tipo_de_calle: 0,
            tipo_de_calles: []
        }
    },

    methods:{

        getEstados: function(){ // Obtener los estados
            axios.get('/api/getEstados')
            .then(function(response){
                    this.estados = response.data;
            }.bind(this));
        },

        getMunicipios: function(){ // Obtener los municipios filtrando el id_estado seleccionado
            axios.get('/api/getMunicipios',{
                params: {
                    id_estado: this.estado
                }
            }).then(function(response){
                this.municipios = response.data;
            }.bind(this));
        },

        getTiposCalle: function(){ // Obtener los tipos de calle
            axios.get('/api/getTiposCalle')
            .then(function(response){
                this.tipo_de_calles = response.data;
            }.bind(this));
        }
    },
    
    created: function(){
        this.getEstados();
        this.getTiposCalle();
    }
};


</script>

<style>
    .mapa {
        height: 625px;
    }
</style>