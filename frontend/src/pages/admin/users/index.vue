<template>
    This is users page
</template>

<script>
    import { useMenu } from '@/stores/use-menu.js';

    export default {
        setup() {
            const store = useMenu();
            store.onSelectedKeys(['admin-users']);
        }
    }
</script>