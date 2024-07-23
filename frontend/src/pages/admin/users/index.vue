<template>
    <a-card title="Tài khoản" style="width: 100%">
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }">
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
                        <template v-else-if="column.key === 'actions'">
                            <a-button type="primary" class="me-2">Edit</a-button>
                            <a-button type="primary" danger>Delete</a-button>
                        </template>
                    </template>
                    <!-- <a-pagination v-model:current="current" :total="500" /> -->
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

        const users = ref([]);
        const columns = [
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
            {
                title: 'Actions',
                key: 'actions',
                // fixed: 'right',
            },
        ];

        const getUsers = async () => {
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

        getUsers();

        const current = ref(6);

        return {
            users,
            columns
        }
    }
})
</script>