import { createApp, markRaw } from 'vue'
import './style.css'
import App from './App.vue'
import './axios'
import { createPinia } from 'pinia'
import router from './router'

const pinia = createPinia();

pinia.use(({store}) => {
    store.router = markRaw(router);
});

const app = createApp(App);
app.use(pinia)


createApp(App).use(router,pinia).mount('#app')
