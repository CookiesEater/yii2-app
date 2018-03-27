<template>
  <b-card header="Список пользователей">
    <vuetable ref="vuetable" :fields="columns" :http-fetch="fetch" pagination-path="pagination" />
  </b-card>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable.vue';
import api from '@/api/users';

export default {
  components: {
    Vuetable,
  },
  data() {
    return {
      columns: [
        {
          name: 'id',
          title: '#',
        },
        {
          name: 'email',
          title: 'Email',
        },
        {
          name: 'created_at',
          title: 'Время регистрации',
        },
        {
          name: 'updated_at',
          title: 'Последнее обновление',
        },
      ],
      fetch(url, data) {
        return api.getList(data);
      },
    };
  },
};
</script>
