<template>
  <div :class="{ 'app header-fixed sidebar-fixed aside-menu-fixed': true, 'sidebar-minimized brand-minimized': sidebarMinimized, 'sidebar-hidden': !sidebarOpen, 'aside-menu-hidden': !asideOpen }">
    <app-header />

    <div class="app-body">
      <sidebar />
      <main class="main">
        <breadcrumbs :list="list" />
        <div class="container-fluid">
          <router-view />
        </div>
      </main>
      <app-aside />
    </div>

    <app-footer />
  </div>
</template>

<script>
import AppHeader from '@/components/AppHeader.vue';
import AppFooter from '@/components/AppFooter.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import Sidebar from '@/components/sidebar/Sidebar.vue';
import AppAside from '@/components/AppAside.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    Breadcrumbs,
    Sidebar,
    AppAside,
  },
  computed: {
    name() {
      return this.$route.name;
    },
    list() {
      return this.$route.matched;
    },
    sidebarMinimized() {
      return this.$store.state.sidebar.minimized;
    },
    sidebarOpen() {
      return this.$store.state.sidebar.open;
    },
    asideOpen() {
      return this.$store.state.aside.open;
    },
  },
};
</script>
