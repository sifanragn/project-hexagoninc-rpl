<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
      <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">
        Register
      </h1>

      <form @submit.prevent="handleRegister" class="space-y-4">
        <!-- Nama -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
            Nama
          </label>
          <input
            type="text"
            id="name"
            v-model="form.name"
            required
            class="w-full border border-gray-300 rounded-md px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
            Email
          </label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            required
            class="w-full border border-gray-300 rounded-md px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500"
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
            v-model="form.password"
            required
            class="w-full border border-gray-300 rounded-md px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Konfirmasi Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
            Konfirmasi Password
          </label>
          <input
            type="password"
            id="password_confirmation"
            v-model="form.password_confirmation"
            required
            class="w-full border border-gray-300 rounded-md px-3 py-2 
                   focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Error Message -->
        <p v-if="errorMessage" class="text-red-600 text-sm">
          {{ errorMessage }}
        </p>

        <!-- Submit -->
        <button
          type="submit"
          :disabled="loading"
          class="w-full bg-green-600 text-white py-2 px-4 rounded-md 
                 hover:bg-green-700 transition disabled:opacity-50"
        >
          <span v-if="loading">Mendaftar...</span>
          <span v-else>Register</span>
        </button>
      </form>

      <router-link
        to="/login"
        class="block mt-4 text-center text-blue-600 hover:underline"
      >
        Sudah punya akun? Login
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "RegisterView",
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "", // <-- wajib ada!
      },
      loading: false,
      errorMessage: "",
    };
  },
  methods: {
    async handleRegister() {
      this.loading = true;
      this.errorMessage = "";

      try {
        console.log("Register payload:", this.form); // cek payload

        await api.post("/register", this.form);

        alert("Registrasi berhasil, silakan login.");
        this.$router.push("/login");
      } catch (err) {
        this.errorMessage =
          err.response?.data?.message || "Register gagal: Network Error";
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
