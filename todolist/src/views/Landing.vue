<template>
  <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600 text-white px-8 py-16">
    <!-- Judul -->
    <h1 class="text-6xl md:text-7xl font-extrabold mb-8 text-center leading-tight">
      📋 To-Do List App
    </h1>

    <!-- Deskripsi -->
    <p class="text-xl md:text-2xl text-blue-100 mb-12 text-center max-w-2xl leading-relaxed">
      Kelola tugas harianmu dengan mudah dan tetap produktif.<br>
      Silakan login atau daftar untuk memulai.
    </p>

    <!-- Tombol -->
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-8">
      <!-- Tombol Login -->
      <router-link to="/login">
        <button
          class="px-10 py-4 md:px-12 md:py-5 bg-white text-blue-600 font-semibold rounded-lg shadow-lg hover:bg-blue-100 transition duration-300"
        >
          Login
        </button>
      </router-link>

      <!-- Tombol Register -->
      <router-link to="/register">
        <button
          class="px-10 py-4 md:px-12 md:py-5 bg-transparent border-2 border-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition duration-300"
        >
          Register
        </button>
      </router-link>
    </div>
  </div>
</template>

<script setup>
/* Kosong karena hanya tampilan */
</script>

<style scoped>
/* Semua efek hover/transition sudah ditangani Tailwind */
</style>
