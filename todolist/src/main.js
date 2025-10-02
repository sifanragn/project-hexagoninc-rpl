// src/main.js
import { createApp } from 'vue'
import App from './views/App.vue'
import router from './router'
import './assets/main.css'
import api from './plugins/api.js' // import axios instance

const app = createApp(App)

// Pasang router
app.use(router)

// Pasang Axios ke global properties, bisa dipanggil pakai this.$api
app.config.globalProperties.$api = api

app.mount('#app')
