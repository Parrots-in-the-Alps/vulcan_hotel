import { createRouter, createWebHashHistory } from 'vue-router'

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
    {
        path: '/',
        name: 'LandingPage',
        component: () => import('../pages/LandingPage.vue')
    },
    {
        path: '/reservation',
        name: 'Reservation',
        component: () => import('../pages/Reservation.vue')
    },
    ]
})

export default router