<template>
  <div>
    <q-table :data="data" :columns="columns" :pagination.sync="pagination" :loading="$vueLoading.isLoading(loader.data)" row-key="name" class="q-mb-md" @request="request">
      <q-td slot="body-cell-actions" slot-scope="props" :props="props">
        <edit-action :to="`update/${props.row.id}`" />
        <remove-action :loader="`${loader.remove}-${props.row.id}`" @remove="remove(props.row.id)" />
      </q-td>
    </q-table>
    <div class="text-right">
      <q-btn to="create" label="Добавить" color="primary" />
    </div>
  </div>
</template>

<script>
import EditAction from '@/components/table/EditAction.vue';
import RemoveAction from '@/components/table/RemoveAction.vue';
import moment from 'moment';
import api from '@/api/users';

export default {
  components: {
    EditAction,
    RemoveAction,
  },
  data() {
    return {
      loader: {
        data: 'data',
        remove: 'remove',
      },
      data: [],
      pagination: {
        page: 1,
        rowsNumber: 1,
        rowsPerPage: 20,
      },
      columns: [
        {
          name: 'id', label: '#', field: 'id', align: 'left', sortable: true,
        },
        {
          name: 'email', label: 'Email', field: 'email', align: 'left', sortable: true,
        },
        {
          name: 'created_at', label: 'Дата создания', field: 'created_at', align: 'left', format: val => moment(val).format('D MMMM YYYY'), sortable: true,
        },
        {
          name: 'updated_at', label: 'Дата обновления', field: 'updated_at', align: 'left', format: val => moment(val).format('D MMMM YYYY'), sortable: true,
        },
        {
          name: 'actions', label: 'Действия', align: 'right',
        },
      ],
    };
  },
  mounted() {
    this.request({ pagination: this.pagination });
  },
  methods: {
    async request({ pagination }) {
      try {
        this.$vueLoading.startLoading(this.loader.data);
        const data = await api.getList(pagination);
        this.pagination = pagination;
        this.pagination.rowsNumber = data.meta.totalCount;
        this.data = data.data;
        this.$vueLoading.endLoading(this.loader.data);
      } catch (error) {
        this.$vueLoading.endLoading(this.loader.data);
      }
    },
    async remove(id) {
      try {
        this.$vueLoading.startLoading(`${this.loader.remove}-${id}`);
        await api.delete(id);
        this.request({ pagination: this.pagination });
        this.$vueLoading.endLoading(`${this.loader.remove}-${id}`);
      } catch (error) {
        this.$vueLoading.endLoading(`${this.loader.remove}-${id}`);
      }
    },
  },
};
</script>
