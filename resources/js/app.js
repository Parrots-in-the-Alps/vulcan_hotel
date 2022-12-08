require('./bootstrap');

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue'
import router from './router';

const userLocale = navigator.language.replace(new RegExp('-.*'), '');

axios.defaults.headers.get['Accept-Language'] = userLocale;

const pinia = createPinia()

const app = createApp(App)
app.config.unwrapInjectedRef = true

app.use(pinia)
app.use(router)
app.mount('#app')
