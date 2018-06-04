<template>
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button" @click.prevent="mobileSidebarToggle">
      <span class="navbar-toggler-icon" />
    </button>
    <router-link class="navbar-brand" to="/" />
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" @click.prevent="sidebarToggle">
      <span class="navbar-toggler-icon" />
    </button>
    <b-navbar-nav class="d-md-down-none">
      <b-nav-item class="px-3">Главная</b-nav-item>
    </b-navbar-nav>
    <b-navbar-nav class="ml-auto">
      <b-nav-item-dropdown right no-caret>
        <template slot="button-content">
          <img src="../assets/images/avatar.jpg" class="img-avatar">
        </template>
        <b-dropdown-header tag="div" class="text-center"><strong>Профиль</strong></b-dropdown-header>
        <b-dropdown-item><i class="fa fa-lock" /> Выход</b-dropdown-item>
      </b-nav-item-dropdown>
    </b-navbar-nav>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" @click.prevent="asideToggle">
      <span class="navbar-toggler-icon" />
    </button>
  </header>
</template>

<script>
export default {
  methods: {
    sidebarToggle() {
      this.$store.commit('toggleSidebar');
    },
    mobileSidebarToggle() {
      // document.body.classList.toggle('sidebar-mobile-show');
    },
    asideToggle() {
      this.$store.commit('toggleAside');
    },
  },
};
</script>
