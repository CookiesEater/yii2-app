<template>
  <q-layout>
    <q-page-container>
      <q-page padding>
        <div class="row justify-center">
          <div class="col-md-3">
            <h1 class="q-display-1 text-center"><strong>А</strong>дминка</h1>
            <form @submit.prevent="login">
              <q-card>
                <q-card-title>Для начала следует зайти</q-card-title>
                <q-card-main>
                  <q-field :error="errors.has('username')" :error-label="errors.first('username')" icon="mdi-account">
                    <q-input v-validate="'required|email'" v-model.trim="form.username" type="email" name="username" float-label="Имя пользователя" />
                  </q-field>
                  <q-field :error="errors.has('password')" :error-label="errors.first('password')" icon="mdi-key">
                    <q-input v-validate="'required'" v-model.trim="form.password" type="password" name="password" float-label="Пароль" required />
                  </q-field>
                </q-card-main>
                <q-card-separator />
                <q-card-actions align="end">
                  <q-btn label="Вход" color="primary" type="submit" flat />
                </q-card-actions>
              </q-card>
            </form>
          </div>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  data() {
    return {
      loader: 'login',
      form: {
        username: '',
        password: '',
      },
    };
  },
  created() {
    this.$validator.localize('ru', {
      attributes: {
        username: 'email',
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
        this.$vueLoading.startLoading(this.loader);
        await new Promise((resolve, reject) => {
          this.$auth.login({
            data: this.form,
            rememberMe: true,
            success: () => resolve,
            error: error => reject(error),
          });
        });
        this.$vueLoading.endLoading(this.loader);
      } catch (error) {
        if (error.response.status === 422) {
          error.response.data.forEach((err) => {
            this.errors.add(err.field, err.message);
          });
        } else {
          this.$q.notify(error.response.data.message);
        }

        this.$vueLoading.endLoading(this.loader);
      }
    },
  },
};
</script>
