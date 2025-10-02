<template>
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-4xl font-bold mb-6 text-center">📝 My To-Do List</h1>

    <!-- Form Tambah Tugas -->
    <div class="mb-6 max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold mb-4">Tambah Tugas Baru</h2>
      <form @submit.prevent="addTask" class="space-y-4">
        <div>
          <input
            v-model="newTask.title"
            type="text"
            placeholder="Judul Tugas"
            class="w-full border border-gray-300 rounded px-3 py-2"
            required
          />
        </div>
        <div>
          <textarea
            v-model="newTask.description"
            placeholder="Deskripsi Tugas"
            class="w-full border border-gray-300 rounded px-3 py-2"
            required
          ></textarea>
        </div>
        <button
          type="submit"
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
        >
          Tambah
        </button>
      </form>
    </div>

    <!-- Daftar Tugas -->
    <div class="max-w-2xl mx-auto space-y-4">
      <div
        v-for="(task, index) in tasks"
        :key="index"
        class="bg-white p-4 rounded-lg shadow flex flex-col md:flex-row md:items-center md:justify-between"
      >
        <!-- Info Tugas -->
        <div class="flex items-center space-x-4">
          <input
            v-if="task.editing"
            type="checkbox"
            v-model="task.completed"
            class="w-5 h-5"
          />
          <div>
            <p :class="{'line-through text-gray-400': task.completed}" class="font-semibold">
              {{ task.title }}
            </p>
            <p :class="{'line-through text-gray-400': task.completed}" class="text-gray-600 text-sm">
              {{ task.description }}
            </p>
          </div>
        </div>

        <!-- Tombol Edit / Delete -->
        <div class="mt-2 md:mt-0 flex space-x-2">
          <button
            v-if="!task.editing"
            @click="task.editing = true"
            class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition"
          >
            Edit
          </button>
          <button
            v-else
            @click="task.editing = false"
            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
          >
            Done
          </button>
          <button
            @click="deleteTask(index)"
            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
          >
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'

// State baru untuk tugas
const tasks = reactive([])

// Form input
const newTask = reactive({
  title: '',
  description: '',
})

// Tambah tugas
const addTask = () => {
  tasks.push({
    title: newTask.title,
    description: newTask.description,
    completed: false,
    editing: false,
  })
  newTask.title = ''
  newTask.description = ''
}

// Delete tugas
const deleteTask = (index) => {
  tasks.splice(index, 1)
}
</script>

<style scoped>
/* Tailwind sudah menangani sebagian besar styling */
</style>
