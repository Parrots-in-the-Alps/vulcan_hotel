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
        comparePasswords(){
            if(this.user.password === this.user.confirmPassword){
                return true;
            }
            alert('passwords did not match');
            return false;
        },

        submit(){
            // if(this.comparePasswords()){
            //     axios.post(,this.user);
            // }
        }


        
    },
    
})