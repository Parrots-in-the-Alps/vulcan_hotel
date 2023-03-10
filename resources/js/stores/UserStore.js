import axios from "axios";
import { defineStore } from 'pinia';
import router from '../router/index.js';
// import CryptoJS from 'crypto-js';

export const useUserStore = defineStore('user',{
    state: () =>({
        logged: false,
        user: {
            name: "toto",
            lastName: "toto lastname",
            email: "toto@gmail.com",
            address: {
                streetNumber: 10,
                steetName: "toto street",
                postalCode: 10,
                city: "toto city",
                country: "toto country",
            },
            password:"toto",
            confirmPassword:"toto"
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
                if(response.status == 200) this.logged = true;
            });
            if(this.logged === true) {
                this.resetUser();
            }
            router.push({name: 'LandingPage'});
        },
        async info() {
            axios.get('/api/user/info')
            .then((response) => {
                if(response.status == 200) this.logged = true;
            })
            .catch((error) => {
                this.logged = false;
            });
        },
        async logout() {
            await axios.get('/api/logout');
            this.logged = false;
            this.resetUser();
            router.push({name: 'LandingPage'});
        },
        resetUser() {
            this.user = {
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
            };
        },
        //https://stackoverflow.com/questions/70094816/encrypt-password-in-front-with-vue-js
        // encrypt (pass) {
        //     return CryptoJS.SHA512(pass).toString();
        // },
        //   decrypt (src) {
        //     const passphrase = '123456'
        //     const bytes = CryptoJS.AES.decrypt(src, passphrase)
        //     const originalText = bytes.toString(CryptoJS.enc.Utf8)
        //     return originalText
        //   }
    },
})