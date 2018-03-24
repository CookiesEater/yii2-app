import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import VueLoading from 'vuex-loading';
import VeeValidate, { Validator } from 'vee-validate';
import ru from 'vee-validate/dist/locale/ru';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueAuth from '@websanova/vue-auth';
import AuthBearer from '@websanova/vue-auth/drivers/auth/bearer';
import AuthAxios from '@websanova/vue-auth/drivers/http/axios.1.x';
import AuthRouter from '@websanova/vue-auth/drivers/router/vue-router.2.x';
import App from '@/App.vue';
import router from '@/router';
import store from '@/store';

// VueAuth need this
Vue.router = router;

Vue.use(BootstrapVue);
Vue.use(VueLoading);
Vue.use(VeeValidate);
Validator.localize('ru', ru);
Vue.use(VueAxios, axios.create({ baseURL: process.env.AXIOS_BASE_URL }));
Vue.use(VueAuth, {
  auth: AuthBearer,
  http: AuthAxios,
  router: AuthRouter,
  loginData: {
    url: '/user/login',
  },
  refreshData: {
    url: '/user/refresh',
  },
  fetchData: {
    url: '/user',
  },
});

new Vue({ // eslint-disable-line no-new
  el: '#app',
  router,
  store,
  vueLoading: new VueLoading({ useVuex: true, moduleName: 'loader' }),
  render: h => h(App),
});