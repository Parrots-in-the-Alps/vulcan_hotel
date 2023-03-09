require('./bootstrap');

import { createApp } from 'vue';
import { createPinia } from 'pinia';

import App from './App.vue'
import router from './router';
import axios from 'axios';

const pinia = createPinia()

const app = createApp(App)
    app.config.unwrapInjectedRef = true

    app.use(pinia)
    app.use(router)
    app.mount('#app')

const userLocale = navigator.language.replace(new RegExp('-.*'), '');
axios.defaults.headers.get['Accept-Language'] = userLocale;
axios.defaults.headers.common['Accept'] = 'application/json';