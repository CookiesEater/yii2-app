<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <b-row class="justify-content-center">
        <b-col md="4">
          <b-card-group>
            <b-card no-body class="p-4">
              <b-card-body>
                <form @submit.prevent="login">
                  <h1>Вход</h1>
                  <p class="text-muted">Ну ты это, заходи если чё</p>
                  <b-alert :show="alert.show" variant="warning" dismissible @dismissed="alert.show = false">
                    {{ alert.message }}
                  </b-alert>
                  <b-input-group class="mb-3">
                    <b-input-group-prepend><b-input-group-text><span class="fa fa-user-circle" /></b-input-group-text></b-input-group-prepend>
                    <b-form-input v-validate="'required|email'" v-model.trim="form.username" :state="errors.has('username') ? false : null" name="username" type="email" placeholder="Имя пользователя" />
                    <b-form-invalid-feedback>{{ errors.first('username') }}</b-form-invalid-feedback>
                  </b-input-group>
                  <b-input-group class="mb-4">
                    <b-input-group-prepend><b-input-group-text><span class="fa fa-key" /></b-input-group-text></b-input-group-prepend>
                    <b-form-input v-validate="'required'" v-model.trim="form.password" :state="errors.has('password') ? false : null" name="password" type="password" placeholder="Пароль" />
                    <b-form-invalid-feedback>{{ errors.first('password') }}</b-form-invalid-feedback>
                  </b-input-group>
                  <b-row>
                    <b-col cols="6">
                      <button-loading :loader="loader" variant="primary" class="px-4" type="submit">Вход</button-loading>
                    </b-col>
                  </b-row>
                </form>
              </b-card-body>
            </b-card>
          </b-card-group>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import ButtonLoading from '@/components/ButtonLoading.vue';

export default {
  components: {
    ButtonLoading,
  },
  data() {
    return {
      loader: 'login',
      alert: {
        show: false,
        message: '',
      },
      form: {
        username: '',
        password: '',
      },
    };
  },
  created() {
    this.$validator.localize('ru', {
      attributes: {
        username: 'логин',
        password: 'пароль',
      },
    });
  },
  methods: {
    async login() {
      await this.$validator.validateAll();
      if (this.errors.any()) {
        return;
      }

      try {
        this.$loading.startLoading(this.loader);
        await new Promise((resolve, reject) => {
          this.$auth.login({
            data: this.form,
            rememberMe: true,
            success: () => resolve,
            error: error => reject(error),
          });
        });
        this.$loading.endLoading(this.loader);
      } catch (error) {
        if (error.response.status === 422) {
          error.response.data.forEach((err) => {
            this.errors.add(err.field, err.message);
          });
        } else {
          this.alert.message = error.response.data.message;
          this.alert.show = true;
        }

        this.$loading.endLoading(this.loader);
      }
    },
  },
};
</script>
