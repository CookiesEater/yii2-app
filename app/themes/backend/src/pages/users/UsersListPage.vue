<template>
  <b-card header="Список пользователей">
    <v-server-table :columns="columns" :options="options" url="">
      <template slot="h__id">#</template>
      <template slot="h__email">Email</template>
      <template slot="h__created_at">Дата регистрации</template>
      <template slot="h__updated_at">Последнее обновление</template>
    </v-server-table>
  </b-card>
</template>

<script>
import moment from 'moment';
import api from '@/api/users';

export default {
  data() {
    return {
      columns: ['id', 'email', 'created_at', 'updated_at'],
      options: {
        async requestFunction(data) {
          const result = (await api.getList(data)).data;
          result.data = result.data.map((val) => {
            val.created_at = moment(val.created_at).format('D MMMM YYYY');
            val.updated_at = moment(val.updated_at).format('D MMMM YYYY');
            return val;
          });
          return result;
        },
        responseAdapter(data) {
          return { data: data.data, count: data.meta.totalCount };
        },
      },
    };
  },
};
</script>
