import Vue from 'vue';
import Vuex from 'vuex';
import createLogger from 'vuex/dist/logger';
import sidebar from './modules/sidebar';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    sidebar,
  },

  state: {

  },

  mutations: {
    title(state, title) {
      state.title = title;
    },
  },

  actions: {

  },

  plugins: process.env.NODE_ENV !== 'production' ? [createLogger()] : [],
  strict: process.env.NODE_ENV !== 'production',
});
