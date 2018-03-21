<template>
  <div>
    <transition :duration="300" name="fade" mode="out-in">
      <router-view />
    </transition>
  </div>
</template>

<style lang="scss">
@import "~@coreui/ajax/Static_Full_Project_GULP/src/scss/style";
@import "~font-awesome/scss/font-awesome";
</style>

<script>
export default {

};
</script>
