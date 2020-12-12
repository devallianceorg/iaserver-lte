import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import controldestencil from './module/controldestencil'
import lanzamientos from './module/lanzamientos'
import produccion from './module/produccion'
import cuarentena from './module/cuarentena'

const store = new Vuex.Store({
  modules: {
    produccion,
    controldestencil,
    lanzamientos,
    cuarentena
  }
});

export default store
// Accede al store directamente desde cualquier parte del proyecto
window.store = store;