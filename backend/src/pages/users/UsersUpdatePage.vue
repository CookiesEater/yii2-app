<template>
  <user-form :id="id" />
</template>

<script>
import UserForm from '@/pages/users/UserForm.vue';

export default {
  components: {
    UserForm,
  },
  computed: {
    id() {
      return parseInt(this.$route.params.id, 10);
    },
  },
};
</script>
