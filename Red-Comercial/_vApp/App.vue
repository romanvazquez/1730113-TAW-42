<template>
    <!-- Layouts dinámicos -->
    <component :is="layout">
        <router-view :layout.sync="layout"/>
    </component>
</template>
<script>
import Vue from 'vue'
import UsuarioLayout from './pages/layouts/Usuario'
import VisitanteLayout from './pages/layouts/Visitante'

import {mapState} from 'vuex'

export default {
    name: 'App',
    components: {
        UsuarioLayout, 
        VisitanteLayout
    },
    computed: mapState(['layout'])
}
</script>