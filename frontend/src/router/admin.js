

import adminView from '@/layouts/admin.vue'
import usersView from '@/pages/admin/users/index.vue'

const admin = [
    {
        path: '/admin',
        component: adminView,
        children: [
            {
                path: 'users',
                name: 'admin-users',
                component: usersView
            }
        ]
    }
]

export default admin;