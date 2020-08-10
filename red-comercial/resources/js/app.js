require('./bootstrap');

window.Vue = require('vue');

import Vuetify from '../plugins/vuetify' // Path to vuetify export

//Default page or layout
import App from './App'

import router from '../router/index'

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    router,
    render: h => h(App)
});