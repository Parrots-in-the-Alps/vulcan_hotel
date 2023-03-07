import axios from "axios";
import { defineStore } from 'pinia';
import router from '../router/index.js';


export const useUserStore = defineStore('user',{
    state: () =>({
        logged: false,
        user: {
            name: "",
            lastName: "",
            email: "",
            address: {
                streetNumber: 0,
                steetName: "",
                postalCode: 0,
                city: "",
                country: "",
            },
            password:"",
            confirmPassword:""
        }
    }),
    actions: {
        async register() {
            await axios.post('/api/register', this.user);
            this.login();
        },
        async login() {
            await axios.get('/sanctum/csrf-cookie');
            this.logged = (await axios.post('/api/login', this.user)).data.token != null ? true : false;
            if(this.logged === true) this.user = {};
            console.log(await axios.get('/api/rooms/active'));
            router.push({name: 'LandingPage'});
        },
        async logout() {
            await axios.get('/api/logout');
            this.logged = false;
            this.user = {};
            router.push({name: 'LandingPage'});
        },
    },
})