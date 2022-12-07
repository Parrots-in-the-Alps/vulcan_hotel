require('./bootstrap');

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue'
import router from './router';

const userLocale = navigator.language.replace(new RegExp('-.*'), '');

axios.defaults.headers.get['Accept-Language'] = userLocale;

const pinia = createPinia()

createApp(App)
    .use(pinia)
    .use(router)
    .mount('#app')
