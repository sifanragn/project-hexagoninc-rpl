<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
      <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Register</h1>

      <form @submit.prevent="handleRegister" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
          <input type="text" id="name" v-model="form.name" required
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" id="email" v-model="form.email" required
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" id="password" v-model="form.password" required
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
          <input type="password" id="password_confirmation" v-model="form.password_confirmation" required
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>

        <p v-if="errorsMessage" class="text-red-600 text-sm">{{ errorsMessage }}</p>

        <button type="submit" :disabled="loading"
          class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition disabled:opacity-50">
          <span v-if="loading">Mendaftar...</span>
          <span v-else>Register</span>
        </button>
      </form>

      <router-link to="/login" class="block mt-4 text-center text-blue-600 hover:underline">
        Sudah punya akun? Login
      </router-link>
    </div>
  </div>
</template>

<script>
import api from '../../plugins/api.js'

export default {
  name: "RegisterView",
  data() {
    return {
      form: { name: "", email: "", password: "", password_confirmation: "" },
      loading: false,
      errorsMessage: "",
    };
  },
  methods: {
    async handleRegister() {
      this.loading = true;
      this.errorsMessage = "";
      try {
        await api.post("/register", this.form);
        alert("Registrasi berhasil, silakan login.");
        this.$router.push("/login");
      } catch (err) {
        if (err.response?.status === 422) {
          this.errorsMessage = Object.values(err.response.data.errors).flat().join(" ");
        } else {
          this.errorsMessage = err.response?.data?.message || err.message;
        }
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
