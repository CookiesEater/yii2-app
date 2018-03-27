import Vue from 'vue';
import 'moment';
import 'moment/locale/ru';
import BootstrapVue from 'bootstrap-vue';
import VueLoading from 'vuex-loading';
import VeeValidate, { Validator } from 'vee-validate';
import ru from 'vee-validate/dist/locale/ru';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { ServerTable } from 'vue-tables-2';
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
Vue.use(ServerTable, {
  theme: 'bootstrap4',
  skin: 'table table-hover',
  sortIcon: {
    base: 'fa',
    up: 'fa-sort-up',
    down: 'fa-sort-down',
    is: 'fa-sort',
  },
  texts: {
    count: 'Записи с {from} по {to} из {count}|{count} записей|Одна запись',
    first: 'Первая',
    last: 'Последняя',
    filter: 'Поиск:',
    filterPlaceholder: 'Поиск...',
    limit: 'Записи:',
    page: 'Страница:',
    noResults: 'Нет подходящих записей',
    filterBy: 'Фильтр по {column}',
    loading: 'Загрузка...',
    defaultOption: 'Выбрана {column}',
    columns: 'Поля',
  },
  requestKeys: {
    orderBy: 'sort',
    limit: 'per-page',
  },
});
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
