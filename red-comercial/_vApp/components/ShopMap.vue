<template>
    <v-container fluid>
        <v-row class="justify-center align-center">
            <v-col cols="12" sm="12" md="10" lg="11" xl="11">
                <v-card>
                    <v-toolbar>
                        <v-toolbar-title class="headline">
                            <v-icon left>mdi-google-maps</v-icon>
                            ¿Qué estás buscando?
                        </v-toolbar-title>
                    </v-toolbar>

                    <br>
                    <label>
                        <gmap-autocomplete
                            @place_changed="setPlace">
                        </gmap-autocomplete>
                        <button @click="addMarker">Add</button>
                    </label>
                    <br>
                    
                    <gmap-map 
                    :center="center"
                    :zoom="15" style="width:100%;  height: 600px;"
                    :options="{streetViewControl: false, mapTypeControl: false}">
            
                        <gmap-marker
                            :key="index"
                            v-for="(m, index) in markers"
                            :position="getPosition(m)"
                            @click="center=m.position"
                        ></gmap-marker>
                    </gmap-map>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>

import axios from 'axios'

export default {
    name: "ShopMap",

    data() {
        return {
        
            center: { lat: 23.7369, lng: -99.141123 }, // Ubicación por defecto (En el caso de de no permitir los permisos de geolocalización)
            markers: [],
            places: [],
            currentPlace: null
        };
    },

    mounted() {
        this.geolocate();
        this.getCoordenadas();
    },

    methods: {
        // Recibe un objeto de lugar a través del componente de autocompletado
        setPlace(place) {
            this.currentPlace = place;
        },
        // Añade el marcador al mapa a través del componente de autocompletado
        addMarker() {
            if (this.currentPlace) {
                
                const marker = { // Define un marcador con sus coordenadas geográficas
                    lat: this.currentPlace.geometry.location.lat(),
                    lng: this.currentPlace.geometry.location.lng()
                };
                
                this.markers.push({ position: marker });
                this.places.push(this.currentPlace);
                
                this.center = marker;
                this.currentPlace = null;
            }
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

        getCoordenadas: function(){ // Recuperar las coordenadas de todas las empresas registradas
            axios.get('/api/getCoordenadas')
            .then(function(response){
                    this.markers = response.data;
                    console.log(this.markers);
            }.bind(this));
        },

        getPosition: function(marker) {
            return {
                lat: parseFloat(marker.latitud),
                lng: parseFloat(marker.longitud)
            }
        },
    }
}
</script>