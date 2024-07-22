<template>
    <a-card title="Tài khoản" style="width: 100%">
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns">
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'stt'">
                            <span>{{ index + 1 }}</span>
                        </template>
                        <template v-if="column.key === 'status_name'">
                            <span v-if="record.status_id == 1" class="text-primary">
                                {{ record.status_name }}
                            </span>
                            <span v-else-if="record.status_id == 2" class="text-danger">
                                {{ record.status_name }}
                            </span>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>

<script>
    import { defineComponent, ref } from 'vue'
    import { useMenu } from '@/stores/use-menu.js'
    import { constants } from '@/config/constants.js'
    import moment from 'moment';

    export default defineComponent({
        setup() {
            const url_get_users = constants.app_url_admin + "/users";

            const store = useMenu();
            store.onSelectedKeys(['admin-users']);

            const users     = ref([]);
            const columns   = [
                {
                    title: "Stt",
                    dataIndex: '',
                    key: 'stt'
                },
                {
                    title: "Account",
                    dataIndex: 'user_name',
                    key: 'user_name'
                },
                {
                    title: "Email",
                    dataIndex: 'email',
                    key: 'email'
                },
                {
                    title: "Status",
                    dataIndex: 'status_name',
                    key: 'status_name'
                },
                {
                    title: "Create Time",
                    dataIndex: 'created_at',
                    key: 'created_at',
                },
            ];

            const getUser = async () => {
                try {
                    const response = await axios.get(url_get_users);
                    console.log('response: ', response.data.data);

                    users.value = response.data.data.data;

                    response.data.data.data.map((el) => {
                        let date = moment(new Date(el.created_at));
                        el.created_at = date.format("DD/MM/YYYY HH:mm:ss")
                    })
                } catch (error) {
                    console.log('error: ', error);
                }
            };

            getUser();

            return {
                users,
                columns
            }
        }
    })
</script>