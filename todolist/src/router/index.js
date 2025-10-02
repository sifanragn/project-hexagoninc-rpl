import { createRouter, createWebHistory } from 'vue-router'
import Landing from '../views/Landing.vue'
import Login from '../views/Auth/Login.vue'
import Register from '../views/Auth/Register.vue'
import ToDoList from '../views/ToDoList.vue'

const routes = [
  { path: '/', name: 'Landing', component: Landing },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/todolist', name: 'ToDoList', component: ToDoList },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
