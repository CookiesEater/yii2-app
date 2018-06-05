import Vue from 'vue';
import VueAuth from '@websanova/vue-auth';
import AuthBearer from '@websanova/vue-auth/drivers/auth/bearer';
import AuthAxios from '@websanova/vue-auth/drivers/http/axios.1.x';
import AuthRouter from '@websanova/vue-auth/drivers/router/vue-router.2.x';
import router from '@/router';

Vue.router = router;
Vue.use(VueAuth, {
  auth: AuthBearer,
  http: AuthAxios,
  router: AuthRouter,
  loginData: {
    url: '/user/login',
  },
  logoutData: {
    redirect: '/login',
  },
  refreshData: {
    url: '/user/refresh',
  },
  fetchData: {
    url: '/user',
  },
});
