<template>
  <q-btn :loading="$vueLoading.isLoading(loader)" icon="mdi-delete" label="Удалить" color="negative" size="sm" @click="remove" />
</template>

<script>
export default {
  props: {
    loader: {
      type: String,
      required: true,
    },
    identifier: {
      type: String,
      default: null,
    },
  },
  methods: {
    async remove() {
      const message = this.identifier ? `Точно удалить элемент "${this.identifier}"?` : 'Точно удалить этот элемент?';
      try {
        await this.$q.dialog({
          title: 'Уверены?',
          message,
          ok: 'Да',
          cancel: 'Нет',
        });
      } catch (e) {
        return;
      }

      this.$emit('remove');
    },
  },
};
</script>
