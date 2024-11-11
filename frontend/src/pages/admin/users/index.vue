<template>
    <a-card title="Tài khoản" style="width: 100%">
        <div class="row">
            <div class="col-12">
                <a-table
                    :dataSource="users"
                    :columns="columns"
                    :scroll="{ x: 576 }"
                    :pagination="false"
                >
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
                </a-table>
                <a-pagination
                    v-model:current="current"
                    :total="totalPage"
                    :defaultPageSize="pageSize"
                    :showTotal="showTotal"
                    :onShowSizeChange="showSizeChange"
                    class="mt-4 d-flex justify-content-center"
                />
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
        const current = ref(1);
        const totalPage = ref(1);
        const pageSize = ref(5);

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
                const resData = response.data.data;

                users.value = resData.data;
                totalPage.value = resData.total;
                current.value = resData.current_page;
                // pageSize.value = ref(2);

                resData.data.map((el) => {
                    let date = moment(new Date(el.created_at));
                    el.created_at = date.format("DD/MM/YYYY HH:mm:ss")
                })

                console.log('response: ', response);
            } catch (error) {
                console.log('error: ', error);
            }
        };

        const showTotal = (a, b) => {
            // console.log('a: ', a);
            // console.log('b: ', b);
        }

        const showSizeChange = (a, b) => {
            console.log('a: ', a);
            console.log('b: ', b);
        }

        getUsers();

        console.log('current: ', current);
        console.log('users: ', users);
        // console.log('pageSize: ', pageSize.value);

        return {
            users,
            columns,
            totalPage,
            current,
            pageSize,
            showSizeChange,
            showTotal,
        }
    }
})
</script>