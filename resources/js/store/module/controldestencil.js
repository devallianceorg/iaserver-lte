const module = {
    state: () => ({
      filterFindByCodigo: '',
      filterFindByKeyword: ''
    }),
    mutations: {
      filterFindByCodigo(state, query) {
        state.filterFindByKeyword= '';
        state.filterFindByCodigo= query;
      },
      filterFindByKeyword(state, query) {
        state.filterFindByCodigo= '';
        state.filterFindByKeyword= query;
      }
    }
};

export default module 