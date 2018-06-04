<template>
  <transition :duration="300" name="fade" mode="out-in">
    <router-view />
  </transition>
</template>

<style lang="scss">
@import "~@coreui/vue/Vue_Full_Project/scss/style";
@import "~font-awesome/scss/font-awesome";
</style>
<style lang="scss" src="@/assets/scss/utils/animations.scss"></style>
