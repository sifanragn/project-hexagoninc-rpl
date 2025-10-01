<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p v-if="user">Selamat datang, <b>{{ user.name }}</b> ({{ user.email }})</p>

    <button
      @click="logout"
      class="mt-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
    >
      Logout
    </button>
  </div>
</template>

<script>
import api from "../plugins/axios";

export default {
  name: "DashboardView",
  data() {
    return {
      user: null,
    };
  },
  async mounted() {
    try {
      const res = await api.get("/user");
      this.user = res.data;
    } catch (err) {
      alert("Gagal ambil data user, silakan login ulang.");
      this.$router.push("/login");
    }
  },
  methods: {
    logout() {
      localStorage.removeItem("token");
      localStorage.removeItem("user");
      this.$router.push("/login");
    },
  },
};
</script>
