<template>
    <div class="container-fuild">
        <div class="row align-items-center box-header">
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawerCategory()">
                    <ProfileOutlined />
                </span>
            </div>

            <div class="col-10 col-sm-9 d-flex align-content-center align-items-center justify-content-center justify-content-sm-start">
                <img src="../assets/logo.png" alt="logo" height="32" width="34" class="logo ms-3 me-3">
                <span class="d-none d-sm-flex">QUẢN TRỊ</span>
            </div>

            <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end">
                Admin
            </div>

            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawerAdmin()">
                    <UserAddOutlined />
                </span>
            </div>
        </div>
    </div>

    <a-drawer
        v-model:open="openCategory"
        title="Danh mục"
        placement="left"
    >
        <TheMenu />
    </a-drawer>

    <a-drawer
        v-model:open="openAdmin"
        title="Admin"
        placement="right"
    >
        <p>Tài khoản</p>
        <p>Đăng xuất</p>
    </a-drawer>
</template>

<script>
    import { defineComponent, ref } from 'vue';
    import TheMenu from './TheMenu.vue';
    import {
        ProfileOutlined,
        UserAddOutlined,
    } from '@ant-design/icons-vue';

    export default defineComponent({
        components: {
            TheMenu,
            ProfileOutlined,
            UserAddOutlined,
        },
        setup() {
            const openCategory = ref(false);
            const openAdmin    = ref(false);

            const showDrawerCategory = () => {
                openCategory.value = true;
            }
            const showDrawerAdmin = () => {
                openAdmin.value = true;
            }

            return {
                openCategory,
                openAdmin,
                showDrawerCategory,
                showDrawerAdmin
            }
        }
    })
</script>

<style scoped>
.box-header {
    background-color: #0c713d;
    padding: 1rem;
    color: white;
}
.box-header .logo {
    border-radius: 20px;
}
</style>>