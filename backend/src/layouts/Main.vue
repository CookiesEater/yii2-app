<template>
  <q-layout view="lHh Lpr lff">
    <q-layout-header>
      <app-header />
    </q-layout-header>

    <q-layout-drawer :value="opened" side="left">
      <app-aside />
    </q-layout-drawer>

    <q-page-container>
      <q-page padding>
        <app-breadcrumbs class="q-mb-md" />
        <transition name="fade" mode="out-in">
          <router-view />
        </transition>
      </q-page>
    </q-page-container>

    <q-layout-footer>
      <app-footer />
    </q-layout-footer>

    <q-ajax-bar />
  </q-layout>
</template>

<script>
import AppHeader from '@/components/app/AppHeader.vue';
import AppFooter from '@/components/app/AppFooter.vue';
import AppAside from '@/components/app/AppAside.vue';
import AppBreadcrumbs from '@/components/app/AppBreadcrumbs.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    AppAside,
    AppBreadcrumbs,
  },
  metaInfo() {
    let title;
    if (this.$route.meta && this.$route.meta.title) {
      ({ title } = this.$route.meta);
    }
    if (this.$route.name) {
      title = this.$route.name;
    }

    return {
      title,
    };
  },
  computed: {
    opened() {
      return this.$store.state.sidebar.opened;
    },
  },
};
</script>
