import Vue from 'vue'
import axios from './plugins/Axios'
import vuetify from './plugins/Vuetify'
import routes from './routes'
import vuex from './store/index.js'
import * as GmapVue from 'gmap-vue'

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

Vue.use(GmapVue, {
    load: {
        key: 'AIzaSyCeaxA8PigzhmvYSteAVU3dZS6S0h87UEI',
        libraries: 'places', // This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
    },
    
    installComponents: true
})

//Default page or layout
import App from './App'

const app = new Vue({
    created () {
        AOS.init()
    },
    vuex,
    router: routes,
    axios,
    vuetify,
    el: '#dApp',
    render: h => h(App)
});