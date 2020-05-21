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

// /.CONTROL DE CONSUMIBLES

import VModal from 'vue-js-modal'
Vue.use(VModal)

import VueSwal from 'vue-swal'
Vue.use(VueSwal)

import VueLodash from 'vue-lodash'
import lodash from 'lodash'
// name is optional
Vue.use(VueLodash, { name: 'lodash' , lodash: lodash })



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#vuelte'
});