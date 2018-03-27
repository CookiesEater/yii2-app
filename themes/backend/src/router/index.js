import Vue from 'vue';
import VueRouter from 'vue-router';
import Full from '@/layouts/Full.vue';
import Empty from '@/layouts/Empty.vue';
import DashboardPage from '@/pages/DashboardPage.vue';
import UsersListPage from '@/pages/users/UsersListPage.vue';
import LoginPage from '@/pages/LoginPage.vue';
import NotFoundPage from '@/pages/NotFoundPage.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Full,
    redirect: '/dashboard',
    name: 'Home',
    meta: { auth: true },
    children: [
      {
        path: 'dashboard',
        name: 'Dashboard',
        component: DashboardPage,
      },
      {
        path: 'users',
        name: 'Пользователи',
        redirect: '/users/list',
        component: Empty,
        children: [
          {
            path: 'list',
            name: 'Список',
            component: UsersListPage,
          },
        ],
      },
    ],
  },
  { path: '/login', component: LoginPage, meta: { auth: false } },
  { path: '*', component: NotFoundPage },
];

export default new VueRouter({
  mode: 'history',
  base: '/admin/',
  routes,
});
