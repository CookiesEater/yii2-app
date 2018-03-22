<template>
  <b-button :disabled="$loading.isLoading(loader)" :variant="variant" :type="type" @click="$emit('click')">
    <v-loading :loader="loader">
      <template slot="spinner">
        <spinner size="small" />
      </template>

      <slot>Отправить</slot>
    </v-loading>
  </b-button>
</template>

<script>
import Spinner from 'vue-simple-spinner';

export default {
  components: {
    Spinner,
  },
  props: {
    loader: {
      type: String,
      required: true,
    },
    variant: {
      type: String,
      default: 'secondary',
    },
    type: {
      type: String,
      default: 'submit',
      validator: type => ['button', 'submit', 'reset'].indexOf(type) !== -1,
    },
  },
};
</script>
