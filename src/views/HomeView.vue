<template>
  <div>
    <h1>Home Page</h1>
    <p>Selamat datang di halaman Home!</p>

    <!-- Button pakai router-link -->
    <router-link to="/login">
      <button>Login</button>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'HomeView'
}
</script>

<style scoped>
h1 {
  color: #42b983;
}
button {
  margin-top: 10px;
  padding: 8px 16px;
  background-color: #42b983;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover {
  background-color: #369870;
}
</style>
