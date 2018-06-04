<template>
  <li :class="{ 'nav-item': true, 'nav-dropdown': item.children, 'open': open }" @click="toggle">
    <router-link :class="{ 'nav-link': true, 'nav-dropdown-toggle': item.children }" :to="item.children ? '#' : item.url" active-class="active">
      <i :class="['fa', `fa-${item.icon}`]" />
      {{ item.label }}
    </router-link>
    <ul v-if="item.children" class="nav-dropdown-items">
      <li v-for="(children, index) in item.children" :key="index" class="nav-item">
        <router-link :to="children.url" class="nav-link">
          <i class="fa fa-circle" />
          {{ children.label }}
        </router-link>
      </li>
    </ul>
  </li>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      open: false,
    };
  },
  methods: {
    toggle() {
      this.open = !this.open;
    },
  },
};
</script>
