export default {
  state: {
    opened: true,
  },

  mutations: {
    open(state) {
      state.opened = true;
    },
    close(state) {
      state.opened = false;
    },
  },

  actions: {
    toggle({ state, commit }) {
      if (state.opened) {
        commit('close');
      } else {
        commit('open');
      }
    },
  },

  namespaced: true,
};
