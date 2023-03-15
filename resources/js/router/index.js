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
            path: '/profile',
            name: 'Profile',
            component: () => import('../components/profile/Profile.vue')
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
                    path: '/reservation/therooms',
                    name: 'TheRooms',
                    component: () => import('../components/reservation/TheRooms.vue')
                },
                {
                    path: '/reservation/services',
                    name: 'Services',
                    component: () => import('../components/reservation/Services.vue')
                },
            ]
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
          return { x: 0, y: 0 };
        } else if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth',
            };
        } else {
          return { x: 0, y: 0 };
        }
      }
});



export default router