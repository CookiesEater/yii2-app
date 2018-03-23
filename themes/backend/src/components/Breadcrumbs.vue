<template>
  <ol class="breadcrumb">
    <li v-for="(item, index) in list" :key="index" class="breadcrumb-item">
      <span v-if="isLast(index)" class="active">{{ showName(item) }}</span>
      <router-link v-else :to="item">{{ showName(item) }}</router-link>
    </li>
  </ol>
</template>

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
