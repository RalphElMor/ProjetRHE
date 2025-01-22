import { createApp } from "vue";

require('./bootstrap');
import App from "./App.vue";
import axios from 'axios';
import router from './router';
import i18n from "./i18n";

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(router);
app.use(i18n);
app.mount('#app');
