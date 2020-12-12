const module = {
  state: {
    cuarentenaItems: []
  },
  mutations: {
    assignCuarentenas (state, payload) {

    }
  },
  actions: {
    CUARENTENA_create ({ commit }, form) {
      commit('assingCuarentenas', form)
    }
  }
}

export default module 