<template>
  <q-breadcrumbs align="right">
    <q-breadcrumbs-el label="Home" to="/" exact />
    <q-breadcrumbs-el v-for="item in breadcrumbs" :key="item.path" :label="showName(item)" :to="item" exact />
  </q-breadcrumbs>
</template>

<script>
export default {
  computed: {
    breadcrumbs() {
      // Корень не нужен, он ставится вручную
      return this.$route.matched.slice(1);
    },
  },
  methods: {
    showName(item) {
      if (item.meta && item.meta.title) {
        return item.meta.title;
      }
      if (item.name) {
        return item.name;
      }

      return '';
    },
  },
};
</script>
