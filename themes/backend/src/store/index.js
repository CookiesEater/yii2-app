import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    sidebar: {
      open: true,
      minimized: false,
    },
    aside: {
      open: false,
    },
  },

  mutations: {
    toggleSidebar(state) {
      state.sidebar.open = !state.sidebar.open;
    },
    toggleSidebarMinimized(state) {
      state.sidebar.minimized = !state.sidebar.minimized;
    },
    toggleAside(state) {
      state.aside.open = !state.aside.open;
    },
  },

  strict: process.env.NODE_ENV !== 'production',
});
