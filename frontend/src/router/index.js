import { createRouter, createWebHistory } from 'vue-router'
import admin from '@/router/admin.js'

const routes = [...admin]

const router = createRouter({
    history: createWebHistory(), // import.meta.env.BASE_URL
    routes
})

export default router
