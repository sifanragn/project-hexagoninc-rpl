<template>
  <!-- Fullscreen wrapper -->
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <!-- Card -->
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
      <!-- Title -->
      <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">
        Login
      </h1>

      <!-- Form -->
      <form @submit.prevent="handleLogin" class="space-y-4">
        <!-- Username -->
        <div>
          <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
            Username
          </label>
          <input
            type="text"
            id="username"
            v-model="username"
            class="w-full border border-gray-300 rounded-md px-3 py-2 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 
                   focus:border-blue-500"
          />
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
            Password
          </label>
          <input
            type="password"
            id="password"
            v-model="password"
            class="w-full border border-gray-300 rounded-md px-3 py-2 
                   focus:outline-none focus:ring-2 focus:ring-blue-500 
                   focus:border-blue-500"
          />
        </div>

        <!-- Login Button -->
        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 px-4 rounded-md 
                 hover:bg-blue-700 transition"
        >
          Login
        </button>
      </form>

      <!-- Back Button -->
      <router-link to="/" class="block mt-4">
        <button
          class="w-full bg-gray-500 text-white py-2 px-4 rounded-md 
                 hover:bg-gray-600 transition"
        >
          Kembali
        </button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    handleLogin() {
      alert(`Login dengan user: ${this.username}, pass: ${this.password}`);
      this.$router.push("/dashboard");
    },
  },
};
</script>
