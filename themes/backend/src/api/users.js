import Vue from 'vue';

const USERS_LIST_ENDPOINT = '/users/list';

export default {
  getList(data) {
    return Vue.axios.get(USERS_LIST_ENDPOINT, { params: data });
  },
};
