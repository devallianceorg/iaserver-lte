window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('home-lte', require('./component/HomeLte.vue').default)
Vue.component('smtdatabase-editar-modelo',require('./component/smtdatabase/FormEditarModelo.vue').default)
Vue.component('smtdatabase-declarar-op',require('./component/smtdatabase/FormDeclararOp.vue').default)

// CONTROL DE CONSUMIBLES
Vue.component('controldeconsumibles-tabla-historial',require('./component/controldeconsumibles/TablaHistorial.vue').default)
Vue.component('controldeconsumibles-registrar',require('./component/controldeconsumibles/Registrar.vue').default)
Vue.component('controldeconsumibles-administrar-impresion',require('./component/controldeconsumibles/administracion/Impresion.vue').default)


// /.CONTROL DE CONSUMIBLES

// CONTROL DE PLACAS
Vue.component('controldeplacas-enviar-op',require('./component/controldeplacas/FormEnviarOp.vue').default)
Vue.component('controldeplacas-paletizar',require('./component/controldeplacas/FormPaletizar.vue').default)
Vue.component('controldeplacas-filtros',require('./component/controldeplacas/Filtros/Main.vue').default)
Vue.component('controldeplacas-recepcionar',require('./component/controldeplacas/FormRecepcionar.vue').default)
// /.CONTROL DE PLACAS

// COGISCAN
Vue.component('cogiscan-utils-dividir-material', require('./component/cogiscan/cogiscanutilities/DividirMaterial.vue').default)
Vue.component('cogiscan-utils-cargar-materiales', require('./component/cogiscan/cogiscanutilities/CargarMateriales.vue').default)
Vue.component('cogiscan-utils-generar-contenedor', require('./component/cogiscan/cogiscanutilities/GenerarContenedor.vue').default)
// / COGISCAN

// AOICOLLECTOR
Vue.component('aoicollector-prod-registrar-header', require('./component/aoicollector/prod/Header.vue').default)
// Vue.component('aoicollector-prod-registrar-infoop', require('./component/aoicollector/prod/InfoOp.vue').default)
Vue.component('aoicollector-prod-registrar-footer', require('./component/aoicollector/prod/Footer.vue').default)
Vue.component('aoicollector-prod-registrar-produccion', require('./component/aoicollector/prod/Produccion.vue').default)
Vue.component('aoicollector-prod-stocker', require('./component/aoicollector/widget/StockerSidebar.vue').default)
// / AOICOLLECTOR

import VModal from 'vue-js-modal'
Vue.use(VModal)

import VueSwal from 'vue-swal'
Vue.use(VueSwal)

// import VueLodash from 'vue-lodash'
// import lodash from 'lodash'
// name is optional
// Vue.use(VueLodash, { name: 'lodash' , lodash: _ })
import store from './store/index'

const app = new Vue({
  el: '#vuelte',
  store
});