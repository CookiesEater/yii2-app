import Vue from 'vue';

const USERS_ENDPOINT = '/users';

export default {
  async getList(pagination = {}) {
    return (await Vue.axios.get(USERS_ENDPOINT, {
      params: {
        page: pagination.page,
        'per-page': pagination.rowsPerPage,
        sort: `${pagination.descending ? '-' : ''}${pagination.sortBy}`,
      },
    })).data;
  },

  async getUser(id) {
    return (await Vue.axios.get(`${USERS_ENDPOINT}/${id}`)).data;
  },

  async create(data) {
    await Vue.axios.post(USERS_ENDPOINT, data);
  },

  async update(id, data) {
    await Vue.axios.put(`${USERS_ENDPOINT}/${id}`, data);
  },

  async delete(id) {
    await Vue.axios.delete(`${USERS_ENDPOINT}/${id}`);
  },
};
