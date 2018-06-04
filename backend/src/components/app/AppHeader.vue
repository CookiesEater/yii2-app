<template>
  <div>
    <q-toolbar color="primary">
      <q-btn icon="menu" flat round dense @click="toggleSidebar" />
      <q-toolbar-title>{{ title }}</q-toolbar-title>
    </q-toolbar>
    <q-tabs>
      <q-route-tab v-for="tab in tabs" slot="title" :key="tab.to" :label="tab.label" :to="tab.to" exact />
    </q-tabs>
  </div>
</template>

<script>
export default {
  props: {
    maxTabs: {
      type: Number,
      default: 10,
    },
  },
  data() {
    return {
      tabs: [],
    };
  },
  computed: {
    title() {
      if (this.$route.meta && this.$route.meta.title) {
        return this.$route.meta.title;
      }
      if (this.$route.name) {
        return this.$route.name;
      }

      return '';
    },
  },
  watch: {
    $route(value) {
      this.addTab(value);
    },
  },
  created() {
    this.addTab(this.$route);
  },
  methods: {
    toggleSidebar() {
      this.$store.dispatch('sidebar/toggle');
    },
    addTab($route) {
      if (this.tabs.find(tab => tab.to === $route.path)) {
        return;
      }
      this.tabs.unshift({
        to: $route.path,
        label: $route.meta ? $route.meta.title : 'Unknown',
      });
      if (this.tabs.length > this.maxTabs) {
        this.tabs.splice(-1, 1);
      }
    },
  },
};
</script>
