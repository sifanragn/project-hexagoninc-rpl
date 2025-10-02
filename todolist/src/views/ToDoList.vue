<template>
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-4xl font-bold mb-6 text-center">📝 My To-Do List</h1>

    <!-- Form Tambah / Edit Tugas -->
    <div class="mb-6 max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-xl font-semibold mb-4">{{ editMode ? 'Edit Tugas' : 'Tambah Tugas Baru' }}</h2>
      <form @submit.prevent="editMode ? updateTask() : addTask()" class="space-y-4">
        <div>
          <input
            v-model="taskForm.title"
            type="text"
            placeholder="Judul Tugas"
            class="w-full border border-gray-300 rounded px-3 py-2"
            required
          />
        </div>
        <div>
          <textarea
            v-model="taskForm.description"
            placeholder="Deskripsi Tugas"
            class="w-full border border-gray-300 rounded px-3 py-2"
            required
          ></textarea>
        </div>
        <button
          type="submit"
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
        >
          {{ editMode ? 'Update' : 'Tambah' }}
        </button>
        <button
          v-if="editMode"
          type="button"
          @click="cancelEdit"
          class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition ml-2"
        >
          Batal
        </button>
      </form>
    </div>

    <!-- Daftar Tugas -->
    <div class="max-w-2xl mx-auto space-y-4">
      <div
        v-for="task in tasks"
        :key="task.id"
        class="bg-white p-4 rounded-lg shadow flex flex-col md:flex-row md:items-center md:justify-between"
      >
        <div>
          <p :class="{'line-through text-gray-400': task.is_done}" class="font-semibold">
            {{ task.title }}
          </p>
          <p :class="{'line-through text-gray-400': task.is_done}" class="text-gray-600 text-sm">
            {{ task.description }}
          </p>
        </div>

        <div class="mt-2 md:mt-0 flex space-x-2">
          <button
            @click="startEdit(task)"
            class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition"
          >
            Edit
          </button>
          <button
            @click="toggleDone(task)"
            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition"
          >
            {{ task.is_done ? 'Undone' : 'Done' }}
          </button>
          <button
            @click="deleteTask(task.id)"
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
import { reactive, ref, onMounted } from 'vue'
import api from '../plugins/api.js'

const tasks = ref([])

// Form state
const taskForm = reactive({
  id: null,
  title: '',
  description: '',
})

const editMode = ref(false)

// Ambil semua task dari backend
const fetchTasks = async () => {
  try {
    const res = await api.get('/todos')
    tasks.value = res.data
  } catch (err) {
    console.error(err)
    alert('Gagal mengambil data todos')
  }
}

// Tambah task baru
const addTask = async () => {
  try {
    const res = await api.post('/todos', {
      title: taskForm.title,
      description: taskForm.description,
    })
    tasks.value.push(res.data)
    taskForm.title = ''
    taskForm.description = ''
  } catch (err) {
    console.error(err)
    alert('Gagal menambah tugas')
  }
}

// Edit task
const startEdit = (task) => {
  taskForm.id = task.id
  taskForm.title = task.title
  taskForm.description = task.description
  editMode.value = true
}

const updateTask = async () => {
  try {
    const res = await api.put(`/todos/${taskForm.id}`, {
      title: taskForm.title,
      description: taskForm.description,
    })
    const index = tasks.value.findIndex(t => t.id === taskForm.id)
    tasks.value[index] = res.data
    cancelEdit()
  } catch (err) {
    console.error(err)
    alert('Gagal mengupdate tugas')
  }
}

const cancelEdit = () => {
  taskForm.id = null
  taskForm.title = ''
  taskForm.description = ''
  editMode.value = false
}

// Delete task
const deleteTask = async (id) => {
  if (!confirm('Yakin ingin menghapus tugas ini?')) return
  try {
    await api.delete(`/todos/${id}`)
    tasks.value = tasks.value.filter(t => t.id !== id)
  } catch (err) {
    console.error(err)
    alert('Gagal menghapus tugas')
  }
}

// Toggle done / undone
const toggleDone = async (task) => {
  try {
    const res = await api.put(`/todos/${task.id}`, {
      ...task,
      is_done: !task.is_done,
    })
    const index = tasks.value.findIndex(t => t.id === task.id)
    tasks.value[index] = res.data
  } catch (err) {
    console.error(err)
    alert('Gagal update status tugas')
  }
}

onMounted(fetchTasks)
</script>

<style scoped>
/* Tailwind sudah cukup */
</style>
