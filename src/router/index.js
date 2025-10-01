import { createRouter, createWebHistory } from "vue-router";

import LoginView from "../views/Auth/LoginView.vue";
import RegisterView from "../views/Auth/RegisterView.vue";
import DashboardView from "../views/Dashboard.vue";

const routes = [
  { path: "/", redirect: "/login" },
  { path: "/login", name: "Login", component: LoginView },
  { path: "/register", name: "Register", component: RegisterView },
  { path: "/dashboard", name: "Dashboard", component: DashboardView },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
