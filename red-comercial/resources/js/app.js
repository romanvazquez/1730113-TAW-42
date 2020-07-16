require('./bootstrap');

window.Vue = require('vue');

Vue.component('registrar-domicilio', require('./components/RegistrarDomicilio.vue').default);
Vue.component('registrar-empresa', require('./components/Empresas/RegistrarEmpresa.vue').default);

const app = new Vue({
    el: '#app',
});
