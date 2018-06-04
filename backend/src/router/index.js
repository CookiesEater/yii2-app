import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '@/layouts/Main.vue';
import DashboardPage from '@/pages/DashboardPage.vue';
import LoginPage from '@/pages/LoginPage.vue';
import NotFoundPage from '@/pages/NotFoundPage.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Main,
    meta: { auth: true, title: 'Home' },
    children: [
      {
        path: '/',
        component: DashboardPage,
        meta: { title: 'Главная' },
      },
      {
        path: '404',
        component: NotFoundPage,
      },
    ],
  },
  { path: '/login', component: LoginPage, meta: { auth: false } },
  { path: '*', redirect: '/404', meta: { auth: false } },
];

export default new VueRouter({
  mode: 'history',
  base: '/admin/',
  routes,
});
