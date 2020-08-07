<template>
    <div>
        <v-form id="empresaAdd" ref="empresaAdd" @submit.prevent="empresaAdd" autocomplete="nope">
            <!-- Cabecera del componente -->
            <Header :heading="getHeading()">
                
                <!-- Botón para guardar y enviar el contenido del formulario -->
                <v-btn min-width="130px" color="success" class="mr-5" type="submit" :loading="$store.state.loading">
                    <v-icon left>mdi-content-save-outline</v-icon>Guardar
                </v-btn>

                <!-- Botón para ir hacia el listado -->
                <v-btn to="/empresas" color="info">
                    <v-icon left>mdi-view-list</v-icon>Ver empresas
                </v-btn>
            </Header>
            
            <!-- Contenido del componente -->
            <v-container>
                <v-row class="justify-center align-center">
                    <v-col cols="12" sm="10" md="8" lg="7" xl="6">    
                        <v-container>

                            <!-- Encabezado del contenedor -->
                            <v-stepper v-model="e1">
                                <v-toolbar flat>
                                    <v-toolbar-title class="headline">
                                        <v-icon left>mdi-store</v-icon>Registra tu empresa
                                    </v-toolbar-title>
                                    <div class="flex justify-center justify-md-end"></div>
                                </v-toolbar>

                                <v-stepper-header>
                                    <v-stepper-step :complete="e1 > 1" editable step="1">
                                        Datos de la empresa
                                    </v-stepper-step>
                                    <v-divider></v-divider>
                                    <v-stepper-step :complete="e1 > 2" editable step="2">
                                        Dirección de la empresa
                                    </v-stepper-step>
                                </v-stepper-header>

                                <v-stepper-items>

                                    <!-- PÁGINA 1 DEL FORMULARIO -->
                                    <v-stepper-content step="1">

                                        <v-text-field type="text" class="mt-2" label="Nombre de la empresa *" outlined dense autofocus required v-model="empresa.nombre"></v-text-field>
                                        <v-textarea outlined dense name="input-7-4" label="Descripción de la empresa (recomendado)" v-model="empresa.descripcion"></v-textarea>

                                        <v-row>
                                            <v-col cols="12" sm="6">
                                                <v-text-field type="tel" label="Teléfono *" outlined dense required v-model="empresa.telefono"></v-text-field>
                                            </v-col>
                                            
                                            <v-col cols="12" sm="6" class="mt-n9">
                                                <v-radio-group label="Giro del comercio *" v-model="empresa.giro_comercio">
                                                    <v-radio label="Productos" value="Productos"></v-radio>
                                                    <v-radio label="Servicios" value="Servicios"></v-radio>
                                                </v-radio-group>
                                            </v-col>
                                        </v-row>

                                        <v-combobox multiple outlined label="Palabras clave *" 
                                            v-model="palabras_clave"
                                            :items="items"
                                            append-icon="mdi-tag"
                                            chips deletable-chips
                                            :search-input.sync="search" 
                                            @keyup.tab="updateTags" @paste="updateTags">

                                            <template v-slot:selection="data">
                                                <v-chip :key="JSON.stringify(data.item)" v-bind="data.attrs" :input-value="data.selected" :disabled="data.disabled" @click:close="data.parent.selectItem(data.item)">
                                                    
                                                    <v-avatar class="accent white--text" left v-text="data.item.slice(0, 1).toUpperCase()"></v-avatar>
                                                    {{ data.item }}
                                                </v-chip>
                                            </template>
                                        </v-combobox>
                                        
                                        <v-file-input outlined dense accept="image/*" small-chips show-size label="Logotipo de la empresa" 
                                        prepend-icon="mdi-camera" ><!-- @change="onFileUpload" -->
                                        </v-file-input>
                                        
                                        <div class="flex justify-center justify-md-end">
                                            <v-btn color="info" @click="e1 = 2">
                                                Continuar<v-icon>mdi-chevron-right</v-icon>
                                            </v-btn>
                                        </div>
                                    </v-stepper-content>

                                    <!-- PÁGINA 2 DEL FORMULARIO -->
                                    <v-stepper-content step="2">
                                        <v-row>
                                            <v-col cols="12" sm="6">
                                                <v-select outlined dense :items="estados" item-text="nombre" item-value="id" label="Estado *" required v-model='direccion.id_estado' @change='getMunicipios()'></v-select>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-select outlined dense :items="municipios" item-text="nombre" item-value="id" label="Municipio *" required v-model='direccion.id_municipio'></v-select>
                                            </v-col>
                                        </v-row>

                                        <v-row>
                                            <v-col cols="12" sm="6">
                                                <v-select outlined dense :items="tipo_de_calles" item-text="nombre" item-value="id" label="Tipo de calle *" required v-model='direccion.id_tipo_calle'></v-select>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-text-field outlined dense type="text" label="Nombre de la calle *" required v-model='direccion.calle'></v-text-field>
                                            </v-col>
                                        </v-row>

                                        <v-row>
                                            <v-col cols="12" sm="4">
                                                <v-text-field outlined dense type="number" label="Código postal *" required v-model='direccion.codigo_postal'></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="8">
                                                <v-text-field outlined dense type="text" label="Colonia *" required v-model='direccion.colonia'></v-text-field>
                                            </v-col>
                                        </v-row>

                                        <v-row>
                                            <v-col cols="12" sm="4">
                                                <v-text-field outlined dense type="number" label="No. Exterior *" required v-model='direccion.num_exterior'></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="8">
                                                <v-text-field outlined dense disabled type="number" label="Latitud *" required v-bind:value='direccion.latitud'></v-text-field>
                                            </v-col>
                                        </v-row>

                                        <v-row>
                                            <v-col cols="12" sm="4">
                                                <v-text-field outlined dense type="number" label="No. Interior" required v-model='direccion.num_interior'></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="8">
                                                <v-text-field outlined dense disabled type="number" label="Longitud *" required v-bind:value='direccion.longitud'></v-text-field>
                                            </v-col>
                                        </v-row>

                                        <v-list-item>
                                            <v-list-item-avatar>
                                                <v-icon>mdi-google-maps</v-icon>
                                            </v-list-item-avatar>
                                            <v-list-item-content>
                                                <v-list-item-title>Ingrese una ubicación</v-list-item-title>
                                                <v-list-item-subtitle>Selecciona la ubicación de tu negocio moviendo el marcador rojo sobre el mapa.</v-list-item-subtitle>
                                                <v-list-item-subtitle>Si está registrado escribe el nombre de tu negocio en el buscador y marcarlo.</v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>

                                        <div class="flex justify-center">
                                            <!-- 
                                                El autocompletado de lugares de google
                                                Se escribe el lugar que queremos posicionar (Ubicados en google maps) -->
                                            <gmap-autocomplete 
                                            @place_changed="setPlace"></gmap-autocomplete>
                                            <v-btn text outlined color="primary" @click="setMarker">Marcar</v-btn>
                                        </div>
                                        
                                        <div class="flex justify-center">
                                            <!-- 
                                                Se define la región que visualiza el mapa y el nivel de Zoom.
                                                Se deshabilitan las opciones de streetViewControl y el tipo de mapa. También se definen las dimensiones. -->
                                            <gmap-map
                                            :center="center" :zoom="15"
                                            :options="{streetViewControl: false, mapTypeControl: false}"
                                            style="width:100%;  height:400px;">
                                                <!-- 
                                                    Se define una posición por defecto para el marcador inicial.
                                                    Se habilita la opción de arrastre del marcador.
                                                    Al finalizar el evento o acción de arrastre se recuperan las coordenadas donde terminó. -->
                                                <gmap-marker 
                                                :position="center"
                                                :clickable="true" :draggable="true"
                                                @dragend="showLocation">
                                                </gmap-marker>
                                            </gmap-map>
                                        </div>

                                        <div class="flex justify-center justify-md-end mt-5">
                                            <v-btn color="light" class="mr-2" @click="e1 = 1">
                                                <v-icon>mdi-chevron-left</v-icon>Regresar
                                            </v-btn>
                                        </div>
                                    </v-stepper-content>
                                </v-stepper-items>
                            </v-stepper>
                        </v-container>
                    </v-col>
                </v-row>
            </v-container>
        </v-form>
    </div>
</template>
<script>

import axios from 'axios'

export default {
    beforeCreate() {

        // Se defines las URL que establecen comunicación entre la vista (cliente) y el controlador (servidor)
        // En este caso se utiliza una sola vista con un formulario para crear nuevos registros y editarlos. 
        var url = '/empresa/add';

        if (this.$router.history.current.params && this.$router.history.current.params.id) {
            url = '/empresa/edit/' + this.$router.history.current.params.id;

            /* 
            * Se envía la solicitud al controlador a través de una promesa axios. 
            * La respuesta de esta promesa (dada por el método correspondiente en el controlador, dictado por la URL) asigna el valor 
            */
            return this.$axiosx.get(url)
            .then((res) => {
                this.empresa = res.data.empresa;
                this.direccion = res.data.direccion;
            });
        }

        return this.$axiosx.get(url)
        .then((res) => {
            this.empresa = res.data.empresa;
        });
    },
    created(){

        // Recupera catálogos de Estados, municipios (dinámico y dependiente del Estado) y tipos de calles.
        this.getEstados();
        this.getTiposCalle();
        
        // 
        // this.getData();
    },
    data () {
      return {
        // empresa: [],
        // direccion:[],
        // Página donde comienza el Asistente multipasos para el registro
        e1: 1,

        // Elementos de selección tipo Dropdowns 
        estados: [],
        municipios: [], // Dependiente dinámico
        tipo_de_calles: [],

        // Logotipo de la empresa
        FILE: null,

        // Empresa
        empresa: {nombre: '', descripcion: '', telefono: '', giro_comercio: 'Productos', logotipo: ''},

        // Dirección
        direccion: {
            id_estado: 0, 
            id_municipio: 0, 
            id_tipo_calle: 0, 
            calle: '', 
            colonia: '', 
            codigo_postal: '', 
            num_exterior: '', 
            num_interior: '', 
            latitud: 0, 
            longitud: 0
        },

        palabras_clave: ['Ventas en línea', 'Comercio electrónico'],
        items: ['Ventas en línea','Comercio electrónico','Innovación','Tecnología','Comercio','Calidad'],
        search: "", // Sync search

        // Componente Google Maps
        center: { lat: 23.7369, lng: -99.141123 }, // Ubicación por defecto (En el caso de de no permitir los permisos de geolocalización)
        marker: null,
        currentPlace: null,
      }
    },
    watch : {
        '$route.query.added' : function (val) {
            this.getData();
        }
    },

    methods: {
        // Elementos SELECT del formulario de DIRECCIÓN
        getEstados: function(){ // Recuperar los estados
            axios.get('/api/getEstados')
            .then(function(response){
                    this.estados = response.data;
            }.bind(this));
        },
        getMunicipios: function(){ // Recuperar los municipios filtrando el id_estado seleccionado
            axios.get('/api/getMunicipios',{
                params: {
                    id_estado: this.direccion.id_estado
                }
            }).then(function(response){
                this.municipios = response.data;
            }.bind(this));
        },
        getTiposCalle: function(){ // Recuperar los tipos de calle
            axios.get('/api/getTiposCalle')
            .then(function(response){
                this.tipo_de_calles = response.data;
            }.bind(this));
        },

        // Método par añadir etiquetas al campo de 'palabras clave'
        updateTags() {
            this.$nextTick(() => {
                this.palabras_clave.push(...this.search.split(","));
                this.$nextTick(() => {
                this.search = "";
                });
            });
        },

        // Solicita permiso al navegador para acceder a la ubicación del usuario. Después la guarda como el punto centro para la visualización del mapa
        geolocate: function() {
            navigator.geolocation.getCurrentPosition(position => {
                this.center = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
            });
        },
        // Recibe un objeto de lugar a través del componente de autocompletado
        setPlace(place) {
            this.currentPlace = place;
        },
        // Inserta el marcador al mapa a través del componente de autocompletado
        setMarker() {
            if (this.currentPlace) { // Verifica que la variable 'currentPlace' sea diferente de NULL
                
                const tmp_marker = { // Define un marcador con sus coordenadas geográficas
                    lat: this.currentPlace.geometry.location.lat(),
                    lng: this.currentPlace.geometry.location.lng()
                };

                this.marker = { position: tmp_marker };
                
                this.center = tmp_marker; // Asigna la nueva ubicación al marcador 
                this.currentPlace = null; // Convierte nuevamente a NULL el lugar actual, para que al momento de buscar otra locación cambiar el marcador

                // Asignar valores de latitud y longitud de los campos en formulario - Obtenidos por el componente de autocompletado.
                this.direccion.latitud = this.marker.position.lat;
                this.direccion.longitud = this.marker.position.lng;
            }
        },
        // Asignar valores de latitud y longitud de los campos en formulario - Obtenidos por el evento 'dragend' del componente del marcador.
        showLocation: function(evt){  
            this.direccion.latitud = evt.latLng.lat();
            this.direccion.longitud = evt.latLng.lng();
        },

        // onFileUpload (event) { // Método para cargar una imagen mediante axios
            
            // Se asocia la variable FILE con el evento de obtener el archivo del explorador
            // this.FILE = event.target.files[0];
        // },
        
        // Obtener información para la vista EDITAR
        getData () {
            if (this.$route.params && this.$route.params.id) {
                var url = '/empresa/edit/' + this.$route.params.id;
                return this.$axiosx.get(url)
                .then((res) => {
                    this.empresa = res.data.empresa;
                    // this.direccion = res.data.direccion;
                });
            }
        },
        getHeading () {
            // Si la variable está definida y tiene un nombre definido, enotnces retornar el nombre para la cabecera
            if (this.empresa && this.empresa.nombre) {
                return this.empresa.nombre;
            }
            // Cabecera por default para la vista
            return 'Agregar empresa';
        },
        empresaAdd () {
            
            // Validacion de formulario
            // PENDIENTES
            
            // Se crea un objeto de tipo FormData
            const formData = new FormData();
            
            /* 
            * FORMULARIO EMPRESAS
            */
            // formData.append('logotipo', this.FILE, this.FILE.name); // Upload file

            formData.append('nombre', this.empresa.nombre);
            formData.append('descripcion', this.empresa.descripcion);
            formData.append('telefono', this.empresa.telefono);
            formData.append('giro_comercio', this.empresa.giro_comercio);

            var cadena_palabras_clave = this.palabras_clave.join(',');
            formData.append('palabras_clave', cadena_palabras_clave);

            /* 
            * FORMULARIO DIRECCIÓN
            */
            formData.append('id_estado', this.direccion.id_estado);
            formData.append('id_municipio', this.direccion.id_municipio);
            formData.append('id_tipo_calle', this.direccion.id_tipo_calle);
            formData.append('calle', this.direccion.calle);
            formData.append('codigo_postal', this.direccion.codigo_postal);
            formData.append('colonia', this.direccion.colonia);
            formData.append('num_exterior', this.direccion.num_exterior);
            formData.append('num_interior', this.direccion.num_interior);
            formData.append('latitud', this.direccion.latitud);
            formData.append('longitud', this.direccion.longitud);

            let url = '/empresa/add';
        
            if (this.$router.history.current.params && this.$router.history.current.params.id) {
                url = '/empresa/edit/' + this.$router.history.current.params.id;
            }

            /*
            * Se envía la solicitud al controlador a través de una promesa axios. La promesa está dada por la URL en cuestión y los datos del objeto de tipo FormData
            * La URL es tomada por el fichero de rutas de Laravel y establece la comunicación de solicitudes entre la ruta (el cliente) y el controlador (el servidor).
            */ 
            this.$axiosx.post(url, formData).then((res) => {
                // Si el controlador envía un estado de error en la validación por parte del servidor
                if (res.data.status == 'error') {
                    // Muestra el mesaje que notifica de este error
                    this.$store.commit('snackbar', res.data);
                }
                
                // Si el controlador envía un estado de redirección. Es decir, que no recibe un 'id' dentro del objeto FromData
                // Entonces agregar al enrutador la dirección (retornada por el controlador a traves de la URL) y el estado de la consulta. También se ejecuta el método local 'added()'.
                if (res.data.status == 'redirect') {
                    this.$router.push({
                        path: res.data.text,
                        query: { added: 'true' }
                    });
                    this.added();
                }
                
                // Si el controlador envía un estado de success en la validación por parte del servidor
                if (res.data.status == 'success') {
                    this.$store.commit('snackbar', res.data);
                }
            });
        },
        added() {
            // Si el estado de la consulta es de aceptado
            if (this.$router.history.current.query.added == 'true') {
                // Muestra el mesaje de éxito
                this.$store.commit('snackbar', {
                    status: 'success',
                    text: 'La página ha sido agregada.'
                });
            }
        }
    }
}
</script>