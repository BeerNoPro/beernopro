<template>
    <TheHeader />
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-3 d-none d-sm-flex box-sibar">
                <a-list bordered class="sider-bar">
                    <template #header>
                        <div>BẢNG ĐIỀU KHIỂN</div>
                    </template>
                    <TheMenu />
                </a-list>
            </div>
            <div class="col-12 col-sm-9">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import TheHeader from "@/components/TheHeader.vue";
    import TheMenu from "@/components/TheMenu.vue";

    export default {
        components: {
            TheHeader,
            TheMenu,
        }
    }
</script>

<style scoped>
    .box-sibar {
        height: 90vh;
    }
    .sider-bar {
        width: 100%;
    }
</style>