import Vue from 'vue';
import App from '@/App.vue';
import router from '@/router';
import store from '@/store';

new Vue({ // eslint-disable-line no-new
  el: '#app',
  router,
  store,
  render: h => h(App),
});
