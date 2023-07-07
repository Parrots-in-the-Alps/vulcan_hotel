import axios from "axios";
import { defineStore } from 'pinia';
import router from '../router/index.js';

export const useUserStore = defineStore('user',{
    state: () =>({
        logged: false,
        user: {
            id: null,
            avatarUrl: "https://daisyui.com/tailwind-css-component-profile-1@94w.jpg",
            name: "Betsy",
            lastName: "Mougnagna",
            // email: "betsy.mougnagna@vulcan-hotel.mom",
            email: "theocolombel@gmail.com",
            address: {
                streetNumber: 10,
                streetName: "toto street",
                postalCode: 10,
                city: "toto city",
                country: "toto country",
            },
            password:"toto",
            confirmPassword:"toto"
        },
        pass: {
            old_password: "",
            new_password: "",
            new_password_confirmation: ""
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
        async logout() {
            await axios.get('/api/logout');
            this.logged = false;
            this.resetUser();
            router.push({name: 'LandingPage'});
        },
        async info() {
            axios.get('/api/user/info')
            .then((response) => {
                if(response.status == 200) {
                    this.logged = true;
                    console.log(response);
                    this.user.id = response.data.id;
                }
            })
            .catch((error) => {
                this.logged = false;
            });
        },
        async updatePassword() {
            axios.post('/api/user/updatepass', this.pass)
            .then((response) => {
                if(response.status == 200) {
                    console.log(response); 
                }
            })
            .catch((error) => {
                console.log(error);
            });
        },
        async getCurrentUser(userID) {
            //TODO
            axios.get('/api/users/' + userID)
            .then((response) => {
                this.user.name = response.data.data.name;
                this.user.email = response.data.data.email;
            })
            .catch((error) => {
                console.log(error);
            });
        },
        resetUser() {
            this.user = {
                id: null,
                avatarUrl: "https://daisyui.com/tailwind-css-component-profile-1@94w.jpg",
                name: "",
                lastName: "",
                email: "",
                address: {
                    streetNumber: 0,
                    streetName: "",
                    postalCode: 0,
                    city: "",
                    country: "",
                },
                password:"",
                confirmPassword:""
            };
        },
    },
})