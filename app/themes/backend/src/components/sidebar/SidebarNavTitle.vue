<template>
  <li class="nav-title">
    {{ title }}
  </li>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
  },
};
</script>
