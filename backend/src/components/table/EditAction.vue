<template>
  <q-btn :to="to" icon="mdi-pencil" label="Изменить" color="secondary" size="sm" />
</template>

<script>
  export default {
    props: {
      to: {
        type: String,
        required: true,
      },
    },
  };
</script>
