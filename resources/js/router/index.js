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
            path: '/auth',
            name: 'Auth',
            component: () => import('../pages/Auth.vue'),
            children: [
                {
                    path: '/auth/register',
                    name: 'Register',
                    component: () => import('../components/auth/Register.vue')
                },
                {
                    path: '/auth/login',
                    name: 'Login',
                    component: () => import('../components/auth/Login.vue')
                },
            ]
        },
        {
            path: '/reservation',
            name: 'Reservation',
            component: () => import('../pages/Reservation.vue'),
            children: [
                {
                    path: '/reservation/stays',
                    name: 'Stays',
                    component: () => import('../components/reservation/Stays.vue')
                },
                {
                    path: '/reservation/availability',
                    name: 'Availability',
                    component: () => import('../components/reservation/Availability.vue')
                },
                {
                    path: '/reservation/services',
                    name: 'Services',
                    component: () => import('../components/reservation/Services.vue')
                },
                {
                    path: '/reservation/check',
                    name: 'Check',
                    component: () => import('../components/reservation/Check.vue')
                },
                {
                    path: '/reservation/summary',
                    name: 'Sumnew',
                    component: () => import('../components/reservation/Summary.vue')
                },
            ]
        },
    ],
});

export default router