import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import produccion from './model/produccion'

const store = new Vuex.Store({
  modules: {
    produccion: produccion
  }
})

export default store
// Accede al store directamente desde cualquier parte del proyecto
window.store = store