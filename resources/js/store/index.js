import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import produccion from './model/produccion'
import controldestencil from './module/controldestencil'

const store = new Vuex.Store({
  modules: {
    produccion: produccion,
    controldestencil: controldestencil
  }
});

export default store
// Accede al store directamente desde cualquier parte del proyecto
window.store = store;