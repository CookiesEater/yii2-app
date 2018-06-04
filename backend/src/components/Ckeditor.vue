<template>
  <textarea />
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import '@ckeditor/ckeditor5-build-classic/build/translations/ru';

export default {
  props: {
    value: {
      type: String,
      default: '',
    },
    config: {
      type: Object,
      default: () => ({
        language: 'ru',
      }),
    },
  },
  data() {
    return {
      instance: null,
    };
  },
  watch: {
    value(val) {
      if (this.instance.getData() !== val) {
        this.instance.setData(val);
      }
    },
  },
  async mounted() {
    this.instance = await ClassicEditor.create(this.$el, this.config);
    this.instance.setData(this.value);
    this.instance.model.document.on('change', () => {
      this.$emit('input', this.instance.getData());
    });
  },
  destroyed() {
    // TODO: Вообще это надо бы делать, но тогда всё так криво смотрится, т.к. видно уничтожение
    // this.instance.destroy();
  },
};
</script>
