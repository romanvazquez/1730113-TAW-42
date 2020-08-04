<template>
    <div>
        <visitante-header></visitante-header>
        <router-view></router-view>
        <visitante-footer></visitante-footer>
    </div>
</template>
<script>
import Vue from 'vue'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

// Componentes para el sitio de visitantes
import VisitanteHeader from '../../components/VisitanteHeader'
import VisitanteFooter from '../../components/VisitanteFooter'

Vue.component('visitante-header', VisitanteHeader)
Vue.component('visitante-footer', VisitanteFooter)

export default {
    name: 'VisitanteLayout'
}
</script>
<style>
#main {
  margin-top: 80px;
}
</style>