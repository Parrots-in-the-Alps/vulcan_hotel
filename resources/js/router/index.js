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
            component: () => import('../pages/Reservation.vue'),
            children: [
                {
                    path: '',
                    name: 'Stays',
                    component: () => import('../components/reservation/Stays.vue')
                },
            ]
        },
    ]
});

export default router