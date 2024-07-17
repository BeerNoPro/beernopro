

import adminView from '@/layouts/admin.vue'
import usersView from '@/pages/admin/users/index.vue'
import usersRoles from '@/pages/admin/roles/index.vue'
import usersSettings from '@/pages/admin/settings/index.vue'

const admin = [
    {
        path: '/admin',
        component: adminView,
        children: [
            {
                path: 'users',
                name: 'admin-users',
                component: usersView
            },
            {
                path: 'roles',
                name: 'admin-roles',
                component: usersRoles
            },
            {
                path: 'settings',
                name: 'admin-settings',
                component: usersSettings
            },
        ]
    }
]

export default admin;