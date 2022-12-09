import { defineStore } from 'pinia'
import axios from "axios"


export const useServiceStore = defineStore('service',{
    state: () =>({
        activeServices: []
    }),
    
    getters:{
        
    },

    actions: {

        async fetchActiveServices(){
            try {
                const data = await axios.get('api/services/active');
                  this.activeServices = data.data['data'];
                }
                catch (error) {
                  alert(error)
                  console.log(error)
              }
        },

        getService(id){
            return this.activeServices.find(service.id === id);
        }
    },
    
})