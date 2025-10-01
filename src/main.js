import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './assets/main.css' // <- ini penting

createApp(App).use(router).mount('#app')
