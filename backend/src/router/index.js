import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '@/layouts/Main.vue';
import Empty from '@/layouts/Empty.vue';
import DashboardPage from '@/pages/DashboardPage.vue';
import UsersListPage from '@/pages/users/UsersListPage.vue';
import UsersCreatePage from '@/pages/users/UsersCreatePage.vue';
import UsersUpdatePage from '@/pages/users/UsersUpdatePage.vue';
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
        path: 'users',
        component: Empty,
        meta: { title: 'Пользователи' },
        redirect: '/users/list',
        children: [
          {
            path: 'list',
            component: UsersListPage,
            meta: { title: 'Список пользователей' },
          },
          {
            path: 'create',
            component: UsersCreatePage,
            meta: { title: 'Добавить пользователя' },
          },
          {
            path: 'update/:id',
            component: UsersUpdatePage,
            meta: { title: 'Редактирование пользователя' },
          },
        ],
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
