<template>
  <div>
    <h1 class="q-headline">{{ title }}</h1>
    <form @submit.prevent="submit">
      <q-field :error="errors.has('email')" :error-label="errors.first('email')">
        <q-input v-validate="'required|email'" v-model.trim="form.email" type="email" name="email" float-label="Email" />
      </q-field>
      <q-field :error="errors.has('password')" :error-label="errors.first('password')">
        <q-input v-validate="'required'" v-model.trim="form.password" type="password" name="password" float-label="Пароль" />
      </q-field>
      <q-field :error="errors.has('password2')" :error-label="errors.first('password2')">
        <q-input v-validate="'required'" v-model.trim="form.password2" type="password" name="password2" float-label="Повторите пароль" />
      </q-field>
      <q-btn :label="button" :loading="$vueLoading.isLoading(loader.submit)" color="primary" type="submit" />
    </form>
    <q-inner-loading :visible="$vueLoading.isLoading(loader.data)">
      <q-spinner-mat :size="50" color="primary" />
    </q-inner-loading>
  </div>
</template>

<script>
import api from '@/api/users';

export default {
  props: {
    id: {
      type: Number,
      default: null,
    },
  },
  data() {
    return {
      loader: {
        data: 'data',
        submit: 'submit',
      },
      form: {
        email: '',
        password: '',
        password2: '',
      },
    };
  },
  computed: {
    isNew() {
      return this.id === null;
    },
    title() {
      return this.isNew ? 'Новый пользователь' : 'Редактирование пользователя';
    },
    button() {
      return this.isNew ? 'Создать' : 'Отредактировать';
    },
  },
  watch: {
    id(val) {
      if (val) {
        this.fetch(val);
      }
    },
  },
  async created() {
    this.$validator.localize('ru', {
      attributes: {
        email: 'Email',
        password: 'Пароль',
        password2: 'Повторение пароля',
      },
    });

    if (!this.isNew) {
      this.fetch(this.id);
    }
  },
  methods: {
    async fetch(id) {
      try {
        this.$vueLoading.startLoading(this.loader.data);
        this.form = await api.getUser(id);
        this.$vueLoading.endLoading(this.loader.data);
      } catch (error) {
        this.$vueLoading.endLoading(this.loader.data);
        this.$router.push('/404');
      }
    },
    async submit() {
      await this.$validator.validateAll();
      if (this.errors.any()) {
        return;
      }

      try {
        this.$vueLoading.startLoading(this.loader.submit);
        if (this.isNew) {
          await api.create(this.form);
          this.$q.notify({ message: 'Пользователь создан', type: 'positive' });
        } else {
          await api.update(this.id, this.form);
          this.$q.notify({ message: 'Пользователь отредактирован', type: 'positive' });
        }
        this.$router.push('/users/list');
        this.$vueLoading.endLoading(this.loader.submit);
      } catch (error) {
        if (error.response.status === 422) {
          error.response.data.forEach((err) => {
            this.errors.add(err.field, err.message);
          });
        }

        this.$vueLoading.endLoading(this.loader.submit);
      }
    },
  },
};
</script>
