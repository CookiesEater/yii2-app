import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

const instance = axios.create({ baseURL: process.env.AXIOS_BASE_URL });

Vue.use(VueAxios, instance);
