import Vue from 'vue'
import axios from './plugins/Axios'
import vuetify from './plugins/Vuetify'
import routes from './routes'
import vuex from './store/index.js'

// Import Bootstrap and BootstrapVue css files
/* npm install vue bootstrap-vue bootstrap */
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Animate on scroll library 
/* npm install --save aos@next */
import AOS from 'aos'
import 'aos/dist/aos.css'

// Vue validate forms
/* npm install vuelidate --save */
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

// Importar módulo de Mapas vue2-google-maps
/* npm install vue2-google-maps */
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyCeaxA8PigzhmvYSteAVU3dZS6S0h87UEI",
        libraries: "places" // Necessary for places input. Also This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
    }
});

//Default page or layout
import layout from './pages/layout'

const app = new Vue({
    created () {
        AOS.init()
    },
    vuex,
    router: routes,
    axios,
    vuetify,
    el: '#dApp',
    render: h => h(layout)
});