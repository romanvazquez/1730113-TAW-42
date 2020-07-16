<template>
    <main id="main">
        <section class="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Registro de empresa</div>
                            <div class="card-body">
                                <form @submit.prevent="registrar">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="name" class="col-form-label">Nombre de la empresa</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="text" class="form-control" id="name" v-model="empresa.nombre" placeholder="Ingrese el nombre de su empresa" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-12">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label">Escribir una descripción.</label>
                                            </div>
                                            <textarea class="form-control mt-2" v-model="empresa.descripcion" id="descripcion" rows="3" maxlength="80"></textarea>
                                            <span id="maxCharacters"></span>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-sm-8">
                                            <label for="telefono" class="col-form-label">Teléfono</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <input type="tel" class="form-control" id="telefono" v-model="empresa.telefono" placeholder="Ingrese número telefónico" data-parsley-type="number" data-parsley-length="[8, 10]" data-parsley-trigger="keyup" required>
                                        </div>
        
                                        <div class="form-group col-sm-4">
                                            <div class="text-left">
                                                <div class="container">
                                                    <label for="giro_comercio" class="col-form-label">Giro del comercio</label>
                                                    <!-- Mandatory field --><sup class="text-danger">*</sup>
                                                    <div class="custom-control custom-radio space-bottom1">
                                                        <input type="radio" class="custom-control-input" v-model="empresa.giro_comercio" id="Productos" value="1" checked>
                                                        <label for="Productos" class="custom-control-label">Productos</label>
                                                    </div>
                                                    <div class="custom-control custom-radio space-bottom1">
                                                        <input type="radio" class="custom-control-input" v-model="empresa.giro_comercio" id="Servicios" value="2">
                                                        <label for="Servicios" class="custom-control-label">Servicios</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-sm-12">
                                            <label for="palabras_clave" class="col-form-label">Palabras clave</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="alert alert-info" role="alert">
                                                <strong>Palabras clave que definan tu negocio.</strong> Escribe hasta 25 palabras separadas por comas.
                                            </div>
                                            <input type="text" class="custom-control-input" id="palabras_clave" v-model="empresa.palabras_clave" data-role="tags-input" value="Ventas en línea, comercio">
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-sm-12">
                                            <label for="logotipo" class="col-form-label">Logitipo de la empresa</label>
                                            <!-- Mandatory field --><sup class="text-danger">*</sup>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logotipo">
                                                <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
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
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    
    data(){
        return {
            empresas: [],
            modoEditar: false,
            empresa: { nombre: '', descripcion: '', telefono: '', palabras_clave: 'comercio electrónico, negocio', logotipo: '' }
        }
    },
    created(){
        axios.get('/empresas').then(res=>{
            this.notas = res.data;
        })
    },

    methods:{
        registrar(){

            // Validación para evitar campos vacíós
            if(this.empresa.nombre.trim() === '' || this.empresa.descripcion.trim() === '' || this.empresa.telefono.trim() === ''){
                console.log(this.empresa.nombre+"\n"+this.empresa.descripcion+"\n"+this.empresa.telefono);
                alert('Debes completar todos los campos antes de guardar');
                return ;
            }
            
            // Instanciacion de un objeto con los parámetros del formulario
            const params = {
                
                nombre: this.empresa.nombre,
                descripcion: this.empresa.descripcion, 
                telefono: this.empresa.telefono,
                giro_comercio: this.empresa.giro_comercio,
                palabras_clave: this.empresas.palabras_clave,
                logotipo: this.empresa.logotipo
            }

            // const nuevaEmpresa = this.empresa;
            // this.empresa = { nombre: ',', descripcion: '', telefono: '', giro_comercio: '', palabras_clave: '', logotipo: '' };

            axios.post('/empresas', params)
                .then((res) =>{

                    const empresaServidor = res.data.id;
                    // this.notas.push(empresaServidor);
                    
            })

            
        }
    }
}
</script>