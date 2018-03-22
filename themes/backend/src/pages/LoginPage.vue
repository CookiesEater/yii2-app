<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <b-row class="justify-content-center">
        <b-col md="4">
          <b-card-group>
            <b-card no-body class="p-4">
              <b-card-body>
                <h1>Вход</h1>
                <p class="text-muted">Ну ты это, заходи если чё</p>
                <b-input-group class="mb-3">
                  <b-input-group-prepend><b-input-group-text><span class="fa fa-user-circle" /></b-input-group-text></b-input-group-prepend>
                  <input type="text" class="form-control" placeholder="Имя пользователя">
                </b-input-group>
                <b-input-group class="mb-4">
                  <b-input-group-prepend><b-input-group-text><span class="fa fa-key" /></b-input-group-text></b-input-group-prepend>
                  <input type="password" class="form-control" placeholder="Пароль">
                </b-input-group>
                <b-row>
                  <b-col cols="6">
                    <b-button variant="primary" class="px-4">Login</b-button>
                  </b-col>
                </b-row>
              </b-card-body>
            </b-card>
          </b-card-group>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
export default {

};
</script>
