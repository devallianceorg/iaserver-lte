window._ = require('lodash');
window.axios = require('axios');
window.Vue = require('vue');

/*
 const files = require.context('./', true, /\.vue$/i);
 files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
 */

require('./headers');
require('./components');

import VModal from 'vue-js-modal'
Vue.use(VModal);

import VueSwal from 'vue-swal'
Vue.use(VueSwal);

import store from './store/index'

const app = new Vue({
  el: '#vuelte',
  store
});