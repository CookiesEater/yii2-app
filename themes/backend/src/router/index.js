import Vue from 'vue';
import VueRouter from 'vue-router';
import DashboardPage from '@/pages/DashboardPage.vue';
import LoginPage from '@/pages/LoginPage.vue';
import NotFoundPage from '@/pages/NotFoundPage.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/', component: DashboardPage, meta: { auth: true } },
  { path: '/login', component: LoginPage, meta: { auth: false } },
  { path: '*', component: NotFoundPage },
];

export default new VueRouter({
  mode: 'history',
  base: '/admin/',
  routes,
});
