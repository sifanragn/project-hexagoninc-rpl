// src/plugins/api.js
import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:8000/api", // pastikan sama dengan backend Laravel
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
  // withCredentials: true, // pakai ini hanya kalau pakai Sanctum cookie
});

// Interceptor untuk menambahkan token dari localStorage
api.interceptors.request.use((config) => {
  const token = localStorage.getItem("token");
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

export default api;
