<template>
  <button class="sidebar-minimizer" type="button" @click="minimize" />
</template>

<script>
export default {
  methods: {
    minimize() {
      this.$store.commit('toggleSidebarMinimized');
    },
  },
};
</script>
