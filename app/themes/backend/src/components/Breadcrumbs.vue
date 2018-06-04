<template>
  <transition-group :duration="300" class="breadcrumb" name="breadcrumbs" tag="ol">
    <li v-for="(item, index) in list" :key="item.path" class="breadcrumb-item">
      <span v-if="isLast(index)" class="active">{{ showName(item) }}</span>
      <router-link v-else :to="item">{{ showName(item) }}</router-link>
    </li>
  </transition-group>
</template>

<style lang="scss" src="@/assets/scss/components/breadcrumbs.scss"></style>

<script>
export default {
  props: {
    list: {
      type: Array,
      required: true,
    },
  },
  methods: {
    isLast(index) {
      return index === this.list.length - 1;
    },
    showName(item) {
      if (item.meta && item.meta.label) {
        return item.meta.label;
      }
      if (item.name) {
        return item.name;
      }

      return '';
    },
  },
};
</script>
