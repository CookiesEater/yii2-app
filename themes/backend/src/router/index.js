import Vue from 'vue';
import VueRouter from 'vue-router';
import DashboardPage from '@/pages/DashboardPage.vue';
import NotFoundPage from '@/pages/NotFoundPage.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/', component: DashboardPage },
  { path: '*', component: NotFoundPage },
];

export default new VueRouter({
  mode: 'history',
  routes,
});
