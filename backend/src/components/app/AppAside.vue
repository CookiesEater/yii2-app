<template>
  <q-scroll-area class="fit">
    <q-list separator no-border>
      <q-item sparse>
        <q-item-side>
          <q-item-tile avatar>
            <img src="@/assets/images/avatar.svg" alt="">
          </q-item-tile>
        </q-item-side>
        <q-item-main :label="username" />
        <q-item-side right>
          <q-btn icon="mdi-dots-vertical" flat round dense>
            <q-popover>
              <q-list link>
                <q-item @click.native="logout">
                  <q-item-side icon="mdi-logout" />
                  <q-item-main label="Выход" />
                </q-item>
              </q-list>
            </q-popover>
          </q-btn>
        </q-item-side>
      </q-item>
      <q-item-separator />

      <q-list-header>Меню</q-list-header>
      <q-item to="/" exact link>
        <q-item-side icon="mdi-home" />
        <q-item-main label="Главная" />
      </q-item>
      <q-collapsible icon="mdi-account-group" label="Пользователи">
        <q-item to="/users/list" exact link>
          <q-item-side icon="mdi-checkbox-blank-circle-outline" />
          <q-item-main label="Список" />
        </q-item>
        <q-item to="/users/create" exact link>
          <q-item-side icon="mdi-checkbox-blank-circle-outline" />
          <q-item-main label="Добавить" />
        </q-item>
      </q-collapsible>
    </q-list>
  </q-scroll-area>
</template>

<script>
export default {
  computed: {
    username() {
      return this.$auth.user().name;
    },
  },
  methods: {
    logout() {
      this.$auth.logout();
    },
  },
};
</script>
