import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
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
Vue.use(VueAxios, axios.create({ baseURL: process.env.AXIOS_BASE_URL }));
Vue.use(VueAuth, {
  auth: AuthBearer,
  http: AuthAxios,
  router: AuthRouter,
  loginData: {
    url: '/user/login', redirect: '/dashboard',
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
  render: h => h(App),
});
