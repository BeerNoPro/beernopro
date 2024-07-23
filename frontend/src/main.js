import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import {
    Pagination,
    Table,
    Card,
    Drawer,
    Button,
    List,
    Menu,
    message
} from "ant-design-vue"

import 'ant-design-vue/dist/reset.css'
import 'bootstrap/dist/css/bootstrap-grid.min.css'
import 'bootstrap/dist/css/bootstrap-utilities.min.css'

window.axios = axios;

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(Pagination)
app.use(Table)
app.use(Card)
app.use(Drawer)
app.use(Button)
app.use(List)
app.use(Menu)
app.mount('#app')

app.config.globalProperties.$message = message
