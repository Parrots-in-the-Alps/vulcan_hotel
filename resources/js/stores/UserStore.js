import { defineStore } from 'pinia'
import axios from "axios"


export const useUserStore = defineStore('user',{
    state: () =>({
        registeredUser:{},
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
    
    getters:{

    },

    actions: {

        
    },
    
})