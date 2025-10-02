<template>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-100 to-blue-200 p-4">
    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-sm">
      <!-- Header -->
      <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Login</h1>
      <p class="text-center text-gray-500 mb-6">Masukkan email dan password untuk masuk</p>

      <!-- Form -->
      <form @submit.prevent="handleLogin" class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <input
            v-model="email"
            type="email"
            required
            placeholder="you@example.com"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <input
            v-model="password"
            type="password"
            required
            placeholder="********"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
          />
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold"
        >
          Masuk
        </button>
      </form>

      <!-- Footer -->
      <div class="text-center mt-6">
        <router-link to="/register" class="text-blue-600 font-medium hover:underline">
          Belum punya akun? Daftar
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import api from '../../plugins/api.js'

export default {
  name: "LoginView",
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async handleLogin() {
      try {
        const res = await api.post("/login", {
          email: this.email,
          password: this.password,
        });

        // Simpan token & user di localStorage
        localStorage.setItem("token", res.data.token);
        localStorage.setItem("user", JSON.stringify(res.data.user));

        // Redirect ke ToDoList setelah login
        this.$router.push("/todolist");  // <-- diubah dari "/dashboard" ke "/todolist"
      } catch (err) {
        alert("Login gagal: " + (err.response?.data?.message || err.message));
      }
    },
  },
};
</script>
