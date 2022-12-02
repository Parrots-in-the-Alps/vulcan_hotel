import { defineStore } from 'pinia'
import axios from "axios"


export const useServiceStore = defineStore('services',{
    state: () =>({
        activeServices: []
    }),
    
    getters:{

    },

    actions: {

        async fetchActiveAdvantages(){
            try {
                const data = await axios.get('api/services/active');
                  this.activeServices = data.data['data'];
                }
                catch (error) {
                  alert(error)
                  console.log(error)
              }
        }
    },
    
})