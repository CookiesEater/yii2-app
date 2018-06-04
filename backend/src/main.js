import Vue from 'vue';
import VueLoading from 'vuex-loading';
import VueMeta from 'vue-meta';
import App from '@/App.vue';
import router from '@/router';
import store from '@/store';
import '@/plugins/axios';
import '@/plugins/auth';
import '@/plugins/moment';
import '@/plugins/validate';
import '@/plugins/quasar';
import { LOADER_MODULE_NAME } from '@/loader/types';

Vue.use(VueLoading);
Vue.use(VueMeta);

new Vue({ // eslint-disable-line no-new
  el: '#app',
  router,
  store,
  vueLoading: new VueLoading({ useVuex: true, moduleName: LOADER_MODULE_NAME }),
  render: createElement => createElement(App),
});
