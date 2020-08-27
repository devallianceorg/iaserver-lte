window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var csrf = document.head.querySelector('meta[name="csrf-token"]');

if (csrf) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');

/*
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
*/

require('./components');

import VModal from 'vue-js-modal'
Vue.use(VModal)

import VueSwal from 'vue-swal'
Vue.use(VueSwal)

// import VueLodash from 'vue-lodash'
// import lodash from 'lodash'
// name is optional
// Vue.use(VueLodash, { name: 'lodash' , lodash: _ })
import store from './store/index'

var apiIngress = document.head.querySelector('meta[name="api-ingress"]');
var apiToken = document.head.querySelector('meta[name="api-token"]');
Vue.prototype.$apiIngress = apiIngress.content;
Vue.prototype.$apiToken = apiToken.content;
window.axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken.content}`;

const app = new Vue({
  el: '#vuelte',
  store
});