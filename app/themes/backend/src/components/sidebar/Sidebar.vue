<template>
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <template v-for="(item, index) in navs">
          <sidebar-nav-title v-if="item.title" :key="index" :title="item.title" />
          <sidebar-nav-item v-else :key="index" :item="item" />
        </template>
      </ul>
    </nav>

    <sidebar-minimizer />
  </div>
</template>

<script>
import SidebarNavTitle from '@/components/sidebar/SidebarNavTitle.vue';
import SidebarNavItem from '@/components/sidebar/SidebarNavItem.vue';
import SidebarMinimizer from '@/components/sidebar/SidebarMinimizer.vue';

export default {
  components: {
    SidebarNavTitle,
    SidebarNavItem,
    SidebarMinimizer,
  },
  data() {
    return {
      navs: [
        {
          title: 'Навигация',
        },
        {
          label: 'Главная',
          url: '/dashboard',
          icon: 'tachometer',
        },
        {
          label: 'Пользователи',
          icon: 'users',
          children: [
            {
              label: 'Список',
              url: '/users/list',
            },
          ],
        },
      ],
    };
  },
};
</script>
