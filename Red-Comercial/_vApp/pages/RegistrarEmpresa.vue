<template>
    <v-container>
        <v-row class="justify-center align-center">
            <v-col cols="12" sm="12" md="11" lg="9" xl="9">
                
                <v-container>
                    <v-stepper v-model="e1">
                        <v-form ref="registerForm" @submit.prevent="register">

                            <v-toolbar flat>
                                <v-toolbar-title class="headline">
                                <v-icon left>mdi-store</v-icon>
                                Registra tu empresa
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
                                        
                                        <v-col cols="12" sm="6" class="mt-n6">
                                            <v-radio-group label="Giro del comercio *" row v-model="empresa.giro_comercio">
                                                <v-radio label="Productos" value="0"></v-radio>
                                                <v-radio label="Servicios" value="1"></v-radio>
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
                                        <v-btn outlined color="primary" @click="e1 = 2">
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
                                        <!-- Se escribe el lugar que queremos posicionar (En caso de estar ubicados en google maps) -->
                                        <gmap-autocomplete 
                                        @place_changed="setPlace"></gmap-autocomplete>
                                        <v-btn text outlined color="primary" @click="setMarker">Marcar</v-btn>
                                    </div>
                                    
                                    <div class="flex justify-center">
                                        <!-- 
                                            Se define la región que visualiza el mapa y el nivel de Zoom.
                                            Se deshabilitan las opciones de streetViewControl y el tipo de mapa. Y se definen las dimensiones. -->
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
                                        <v-btn outlined color="grey" class="mr-2" @click="e1 = 1">
                                            <v-icon>mdi-chevron-left</v-icon>Regresar
                                        </v-btn>
                                        <v-btn outlined type="submit" color="success" :loading="loading">
                                            Registrar<v-icon>mdi-check</v-icon>
                                        </v-btn>
                                    </div>
                                </v-stepper-content>
                            </v-stepper-items>

                        </v-form>
                    </v-stepper>
                </v-container>

            </v-col>
        </v-row>
    </v-container>
</template>
<script>

// import Vue from 'vue'
import axios from 'axios'

export default {
    name: 'RegistrarEmpresa',
    data() {
        return {
            // Página donde comienza el Asistente multipasos para el registro
            e1: 1,

            // Dropdowns 
            estados: [],
            municipios: [], // Dependiente dinámico
            tipo_de_calles: [],

            // Logotipo de la empresa
            FILE: null,

            // Empresa
            empresa: {nombre: '', descripcion: '', telefono: '', giro_comercio: '0', logotipo: ''},

            // Dirección
            direccion: {id_estado: 0, id_municipio: 0, id_tipo_calle: 0, calle: '', colonia: '', codigo_postal: '', num_exterior: '', num_interior: '', latitud: 0, longitud: 0},

            palabras_clave: ['Ventas en línea', 'Comercio electrónico'],
            items: ['Ventas en línea','Comercio electrónico','Innovación','Tecnología','Comercio','Calidad'],

            loading: false, // Da animación de carga en el botón de Submit
            search: "", // Sync search

            // Componente Google Maps
            center: { lat: 23.7369, lng: -99.141123 }, // Ubicación por defecto (En el caso de de no permitir los permisos de geolocalización)
            marker: null,
            currentPlace: null,
        }
    },
    mounted() {
        // Método para geolocalizar
        this.geolocate();
    },
        
    created () {

        // Se inicializan los que recuperan los registros de las catálogos
        this.getEstados()
        this.getTiposCalle()
    },

    methods: {
        
        // Elementos SELECT del formulario de DIRECCIÓN
        getEstados: function(){ // Obtener los estados
            axios.get('/api/getEstados')
            .then(function(response){
                    this.estados = response.data;
            }.bind(this));
        },
        getMunicipios: function(){ // Obtener los municipios filtrando el id_estado seleccionado
            axios.get('/api/getMunicipios',{
                params: {
                    id_estado: this.direccion.id_estado
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

                // Asignar valores de latitud y longitud de los campos en formulario
                this.direccion.latitud = this.marker.position.lat;
                this.direccion.longitud = this.marker.position.lng;
            }
        },
        // Muestra en los campos de texto la Latitud y la Longitud del marcador en el mapa
        showLocation: function(evt){
            
            // Asignar valores de latitud y longitud de los campos en formulario
            this.direccion.latitud = evt.latLng.lat();
            this.direccion.longitud = evt.latLng.lng();
        },

        // onFileUpload (event) { // Método para cargar una imagen mediante axios
            
            // Se asocia la variable FILE con el evento de obtener el archivo del explorador
            // this.FILE = event.target.files[0];
        // },

        // Registrar en la base de datos el usuario:
        register(evt){
            // this.loading = true;

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

            let cadena_palabras_clave = this.palabras_clave.join(',');
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

            // Display the key/value pairs
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }

            // axios.post('/empresas', formData, {
            // }).then((res) => {

            //     // Enviar alerta o dirigir hacia otra página
            //     console.log(res)
            // })
        }
    },
    
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped> 
    h1,h2 {
        font-weight: normal;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    li {
        display: inline-block;
        margin: 0 10px;
    }
    a {
        color: #42b983;
    }
</style>