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
            await axios.post('/api/login', this.user).then((response) => {
                if(response.status == 200) {
                    this.logged = true;
                }
            });
            if(this.logged === true) this.user = {};
            router.push({name: 'LandingPage'});
        },
        async info() {
            axios.get('/api/user/info').then((response) => {
                if(response.status == 200) {
                    this.logged = true;
                } else {
                    this.logged = false;
                }
            });
        },
        async logout() {
            await axios.get('/api/logout');
            this.logged = false;
            this.user = {};
            router.push({name: 'LandingPage'});
        },
    },
})